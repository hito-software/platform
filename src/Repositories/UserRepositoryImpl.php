<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Group;
use Hito\Platform\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserRepositoryImpl implements UserRepository
{
    public function create(string $name,
                           string $surname,
                           string $email,
                           string $password,
                           string $locationId,
                           string $timezone,
                           ?string $phone = null,
                           ?string $skype = null,
                           ?string $whatsapp = null,
                           ?string $telegram = null): User
    {
        $data = compact('name', 'surname', 'email', 'phone', 'skype', 'whatsapp', 'telegram', 'password');
        $data['timezone_id'] = $timezone;
        $data['location_id'] = $locationId;

        return User::create($data);
    }

    public function update(string $id, array $data): User
    {
        $model = $this->getById($id);
        $model->update(\Arr::except($data, ['groups', 'permissions']));

        if ($groups = \Arr::get($data, 'groups', null)) {
            $this->syncGroups($groups, $model);
        }

        if ($permissions = \Arr::get($data, 'permissions', null)) {
            $this->syncPermissions($permissions, $model);
        }

        return $model;
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function getById(string $id): User
    {
        return User::findOrFail($id);
    }

    public function getByIds(array $ids): Collection
    {
        return User::whereIn('id', $ids)->get();
    }

    public function getByEmail(string $email): User
    {
        return User::whereEmail($email)->firstOrFail();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return User::paginate();
    }

    public function syncGroups(array $groupIds, User|string $user): void
    {
        if (is_string($user)) {
            $user = $this->getById($user);
        }

        $groups = Group::whereIn('id', $groupIds)->get();
        $user->syncGroups($groups);
    }

    public function syncPermissions(array $permissionIds, User|string $user): void
    {
        if (is_string($user)) {
            $user = $this->getById($user);
        }

        $permissions = Group::whereIn('id', $permissionIds)->get();

        $user->syncPermissions($permissions);
    }
}
