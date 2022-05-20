<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermissionRepositoryImpl implements PermissionRepository
{
    public function getAll(): Collection
    {
        return Permission::all();
    }

    public function create(string $name): \Spatie\Permission\Contracts\Permission
    {
        return Permission::findOrCreate($name);
    }

    public function getByName(string $name): Permission
    {
        return Permission::whereName($name)->firstOrFail();
    }

    public function update(array $data, string $name): Permission
    {
        $model = $this->getByName($name);
        $model->update($data);

        return $model;
    }

    public function destroy(string $name): bool
    {
        $model = $this->getByName($name);

        return $model->delete();
    }
}
