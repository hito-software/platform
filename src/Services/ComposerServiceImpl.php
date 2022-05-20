<?php

namespace Hito\Platform\Services;

use Hito\Platform\Repositories\ComposerRepository;
use File;
use Illuminate\Support\Collection;

class ComposerServiceImpl implements ComposerService
{
    public function __construct(private ComposerRepository $composerRepository)
    {
    }

    public function getPackageList(): Collection
    {
        return $this->composerRepository->getPackageList();
    }

    public function isPackageInstalled(string $packageName): bool
    {
        return $this->composerRepository->isPackageInstalled($packageName);
    }

    public function installPackage(string $packageName, ?string $version = null): false|null|string
    {
        // TODO Fix vendor directory permissions
        $root = base_path('');

        if(is_null($version)) {
            $package = $this->composerRepository->getRepositoryManager()->findPackage($packageName, '*');
            $version = $package->getPrettyVersion();
        }

        $this->updateModuleList($packageName, 'add', $version);

        return shell_exec("cd {$root} && composer update --no-ansi --profile");
    }

    public function uninstallPackage(string $packageName): string|null {
        // TODO Fix vendor directory permissions
        $root = base_path('');

        $this->updateModuleList($packageName, 'remove');

        return shell_exec("cd {$root} && composer update --no-ansi --profile");
    }

    private function updateModuleList(string $packageName, string $action, string $version = null): void
    {
        $composerFile = base_path('.runtime/composer.json');
        File::ensureDirectoryExists(dirname($composerFile));

        $data = [];
        if (File::exists($composerFile)) {
            try {
                $data = json_decode(File::get($composerFile), true, flags: JSON_THROW_ON_ERROR);
            // @phpstan-ignore-next-line
            } catch(\JsonException) {
                $data = [];
            }
        }

        if($action === 'add') {
            $data['require'][$packageName] = $version;
        } elseif($action === 'remove') {
            unset($data['require'][$packageName]);
        }

        if (empty($data)) {
            $data['require'] = [];
        }

        File::put($composerFile, json_encode($data, JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES));
    }
}
