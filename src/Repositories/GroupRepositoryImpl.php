<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupRepositoryImpl implements GroupRepository
{
    public function getAll(): Collection
    {
        return Group::all();
    }

    public function create(string $name, ?string $description = null, array $users = [], array $permissions = []): Group
    {
        $group = Group::create(compact('name', 'description'));

        $group->users()->sync($users);
        $group->permissions()->sync($permissions);

        return $group;
    }

    public function update(string $id, array $data): void
    {
        $group = $this->getById($id);
        $group->update(\Arr::except($data, ['users', 'permissions']));

        $group->users()->sync(\Arr::get($data, 'users'));
        $group->permissions()->sync(\Arr::get($data, 'permissions'));

    }

    public function getById(string $id): Group
    {
        return Group::findOrFail($id);
    }

    public function getByIds(array $ids): Collection
    {
        return Group::whereIn('id', $ids)->get();
    }

    public function syncUsers(string $id, array $userIds): bool
    {
        $group = $this->getById($id);

        $group->users()->sync($userIds);

        return true;
    }

    public function syncPermissions(string $id, array $permissions): bool
    {
        $group = $this->getById($id);
        $group->syncPermissions($permissions);

        return true;
    }
}
