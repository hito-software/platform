<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Permission;
use Illuminate\Support\Collection;

interface PermissionService
{
    public function getAll(): Collection;

    public function create(string $name): \Spatie\Permission\Contracts\Permission;

    public function getByName(string $name): Permission;

    public function update(array $data, string $name): Permission;

    public function destroy(string $name): bool;
}
