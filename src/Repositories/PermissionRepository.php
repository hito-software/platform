<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

interface PermissionRepository
{
    public function getAll(): Collection;

    public function create(string $name): \Spatie\Permission\Contracts\Permission;

    public function getByName(string $name): Permission;

    public function update(array $data, string $name): Permission;

    public function destroy(string $name): bool;
}
