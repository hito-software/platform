<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepositoryImpl implements RoleRepository
{
    public function getByIds(array $ids): Collection
    {
        return Role::whereIn('id', $ids)->get();
    }

    public function getById(string $id): Role
    {
        return Role::findOrFail($id);
    }

    public function getRequiredByType(string $type, bool $required = true): Collection
    {
        return Role::whereRequired($required)->whereEntityType($type)->get();
    }

    public function getAllByType(string $type): Collection
    {
        return Role::whereEntityType($type)->get();
    }

    public function create(string $type, ?string $name = null, ?string $description = null, ?bool $required = null): Role
    {
        $data = compact('name', 'description', 'required');
        $data['entity_type'] = $type;

        return Role::create($data);
    }

    public function update(string $id, array $data): bool
    {
        return !!Role::findOrFail($id)->update($data);
    }
}
