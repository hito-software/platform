<?php

namespace Hito\Platform\Repositories;

use Carbon\Carbon;
use Hito\Platform\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
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
                           ?string $telegram = null): User;

    public function update(string $id, array $data): User;

    public function getAll(): Collection;

    public function getById(string $id): User;

    public function getByIds(array $ids): Collection;

    public function getByEmail(string $email): User;

    public function getAllPaginated(): LengthAwarePaginator;

    public function syncGroups(array $groupIds, User|string $user): void;

    public function syncPermissions(array $permissionIds, User|string $user): void;
}
