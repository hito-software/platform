<?php

namespace Hito\Platform\Services;

use Illuminate\Support\Collection;

interface ComposerService
{
    public function getPackageList(): Collection;

    public function isPackageInstalled(string $packageName): bool;

    public function installPackage(string $packageName, ?string $version = null): false|null|string;

    public function uninstallPackage(string $packageName): string|null;
}
