<?php

namespace Hito\Platform\Repositories;

use Composer\Composer;
use Composer\Factory;
use Composer\InstalledVersions;
use Composer\IO\NullIO;
use Composer\Package\PackageInterface;
use Composer\Repository\RepositoryInterface;
use Composer\Repository\RepositoryManager;
use Composer\Semver\Comparator;
use Composer\Semver\Semver;
use File;
use Illuminate\Support\Collection;

class ComposerRepositoryImpl implements ComposerRepository
{
    public function getComposerInstance(): Composer
    {
        $mainFile = base_path('composer.json');

        $config = json_decode(File::get($mainFile), true);

        if (!empty($config['extra']['merge-plugin']['include'])) {
            foreach($config['extra']['merge-plugin']['include'] as $file) {
                $path = base_path($file);

                if(!File::exists($path)) {
                    continue;
                }

                try {
                    $config = array_merge_recursive($config, json_decode(File::get($path), true, JSON_THROW_ON_ERROR));
                } catch (\JsonException) {
                    //
                }
            }
        }

        return Factory::create(new NullIO(), $config);
    }

    public function getRepositoryManager(): RepositoryManager
    {
        return $this->getComposerInstance()->getRepositoryManager();
    }

    public function getPackageList(): Collection
    {
        $composerRepository = $this->getRepositoryManager();

        $list = collect();

        foreach ($composerRepository->getRepositories() as $repository) {
            $data = [
                'repository' => $repository,
                'packages' => $repository->search('*', 0, 'hito-module')
            ];

            if (empty($data['packages'])) {
                continue;
            }

            $packages = array_map(function ($package) use ($repository) {
                $isInstalled = $this->isPackageInstalled($package['name'], $repository);
                $installedVersion = $this->getInstalledPackageVersion($package['name']);
                $versions = collect($repository->findPackages($package['name'], '*'));
                $stringVersions = $versions->map(fn($item) => $item->getPrettyVersion())->toArray();
                $updateVersion = null;

                $stringVersions = Semver::sort($stringVersions);

                if ($isInstalled) {
                    $stringVersions = $versions->map(fn($item) => $item->getPrettyVersion());
                    $splitVersion = explode('.', $installedVersion, 4);

                    if (count($splitVersion) >= 3) {
                        $versionConstraint = "{$splitVersion[0]}.*.*";

                        $stringVersions->each(function($version) use (&$updateVersion, $versionConstraint) {
                            if (Semver::satisfies($version, $versionConstraint) &&
                                Comparator::greaterThan($version, $updateVersion)) {
                                $updateVersion = $version;
                            }
                        });
                    }

                    if (!is_null($updateVersion) && Comparator::lessThanOrEqualTo($updateVersion, $installedVersion)) {
                        $updateVersion = null;
                    }
                }

                return [
                    ...$package,
                    'installed' => $isInstalled,
                    'installed_version' => $installedVersion,
                    'update_version' => $updateVersion,
                    'string_versions' => $stringVersions,
                    'versions' => $versions
                ];
            }, $data['packages']);

            $data = [
                ...$data,
                'packages' => $packages,
            ];

            $list->push($data);
        }

        return $list;
    }

    public function isPackageInstalled(string $packageName, ?RepositoryInterface $repository = null): bool
    {
        try {
            InstalledVersions::isInstalled($packageName);
        } catch (\OutOfBoundsException) {
            return false;
        }

        if (is_null($repository)) {
            return true;
        }

        return !is_null($this->getInstalledPackageByNameAndRepository($packageName, $repository));
    }

    public function getInstalledPackageVersion(string $packageName): ?string
    {
        if (!$this->isPackageInstalled($packageName)) {
            return null;
        }

        try {
            return InstalledVersions::getPrettyVersion($packageName);
        } catch (\OutOfBoundsException) {
            return null;
        }
    }

    public function getInstalledPackageByName(string $packageName): ?PackageInterface
    {
        return $this->getInstalledPackageByNameAndRepository($packageName);
    }

    public function getInstalledPackageByNameAndRepository(string $packageName, ?RepositoryInterface $repository = null): ?PackageInterface
    {
        try {
            InstalledVersions::isInstalled($packageName);
        } catch (\OutOfBoundsException) {
            return null;
        }

        $version = $this->getInstalledPackageVersion($packageName);

        try {
            $hash = InstalledVersions::getReference($packageName);
        } catch (\OutOfBoundsException) {
            return null;
        }

        if (is_null($repository)) {
            $versions = [];
            foreach ($this->getRepositoryManager()->getRepositories() as $repository) {
                $versions = array_merge($versions, $repository->findPackages($packageName, $version));
            }
        } else {
            $versions = $repository->findPackages($packageName, $version);
        }

        $versions = array_filter($versions, fn($version) => $version->getDistReference() === $hash);

        return array_shift($versions);
    }
}
