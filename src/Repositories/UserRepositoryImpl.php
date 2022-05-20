<?php

namespace Hito\Platform\Repositories;

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
        $data = compact('name', 'surname', 'email', 'timezone', 'phone', 'skype', 'whatsapp', 'telegram', 'password');
        $data['location_id'] = $locationId;

        return User::create($data);
    }

    public function update(string $id, array $data): User
    {
        $model = $this->getById($id);
        $model->update($data);

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

    public function syncGroups(string $id, array $groupIds): bool
    {
        $user = $this->getById($id);

        $user->syncGroups($groupIds);

        return true;
    }

    public function syncPermissions(string $id, array $permissions): bool
    {
        $user = $this->getById($id);
        $user->syncPermissions($permissions);

        return true;
    }
}
