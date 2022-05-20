<?php

namespace Hito\Platform\Repositories;

use Composer\Composer;
use Composer\Package\PackageInterface;
use Composer\Repository\RepositoryInterface;
use Composer\Repository\RepositoryManager;
use Illuminate\Support\Collection;

interface ComposerRepository
{
    public function getComposerInstance(): Composer;

    public function getRepositoryManager(): RepositoryManager;

    public function getPackageList(): Collection;

    public function isPackageInstalled(string $packageName, ?RepositoryInterface $repository = null): bool;

    public function getInstalledPackageVersion(string $packageName): ?string;

    public function getInstalledPackageByName(string $packageName): ?PackageInterface;

    public function getInstalledPackageByNameAndRepository(string $packageName, ?RepositoryInterface $repository = null): ?PackageInterface;
}
