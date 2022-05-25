<?php

namespace Hito\Platform\Repositories;

use Carbon\Carbon;
use Hito\Admin\Enums\ContactType;
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
                           ?Carbon $birthdate = null,
                           ?string $phone = null,
                           ?string $skype = null,
                           ?string $whatsapp = null,
                           ?string $telegram = null): User
    {
        $data = compact('name', 'surname', 'email', 'password', 'birthdate');
        $data['timezone_id'] = $timezone;
        $data['location_id'] = $locationId;

        $user = User::create($data);

        $this->updateContactInfo($user, ContactType::PHONE, $phone);
        $this->updateContactInfo($user, ContactType::SKYPE, $skype);
        $this->updateContactInfo($user, ContactType::WHATSAPP, $whatsapp);
        $this->updateContactInfo($user, ContactType::TELEGRAM, $telegram);

        return $user;
    }

    public function update(string $id, array $data): User
    {
        $model = $this->getById($id);
        $model->update(\Arr::except($data, ['groups', 'permissions', 'phone', 'skype', 'whatsapp', 'telegram']));

        $this->updateContactInfo($model, ContactType::PHONE, \Arr::get($data, 'phone'));
        $this->updateContactInfo($model, ContactType::SKYPE, \Arr::get($data, 'skype'));
        $this->updateContactInfo($model, ContactType::WHATSAPP, \Arr::get($data, 'whatsapp'));
        $this->updateContactInfo($model, ContactType::TELEGRAM, \Arr::get($data, 'telegram'));

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

    public function updateContactInfo(User|string $user, ContactType $type, ?string $value): void
    {
        if (is_string($user)) {
            $user = $this->getById($user);
        }

        if (is_null($value)) {
            $user->contacts()->where('type', $type)->delete();
        } else {
            $user->contacts()->updateOrCreate(
                compact('type'),
                compact('value')
            );
        }
    }
}
