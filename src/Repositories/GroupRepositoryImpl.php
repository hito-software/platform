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

    public function create(array $data): Group
    {
        $members = [];
        if (!empty($data['members'])) {
            $members = $data['members'];
            unset($data['members']);
        }

        $permissions = [];
        if (!empty($data['permissions'])) {
            $permissions = $data['permissions'];
            unset($data['permissions']);
        }

        $group = Group::create($data);
        $group->users()->sync($members);
        $group->permissions()->sync($permissions);

        return $group;
    }

    public function update(string $id, array $data): void
    {
        $members = [];
        if (!empty($data['members'])) {
            $members = $data['members'];
            unset($data['members']);
        }

        $permissions = [];
        if (!empty($data['permissions'])) {
            $permissions = $data['permissions'];
            unset($data['permissions']);
        }
        $group = $this->getById($id);
        $group->users()->sync($members);
        $group->permissions()->sync($permissions);
        Group::findOrFail($id)->update($data);

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
