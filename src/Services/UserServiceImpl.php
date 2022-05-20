<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\User;
use Hito\Platform\Repositories\UserRepository;
use Faker\Factory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserServiceImpl implements UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function create(string $name,
                           string $surname,
                           string $email,
                           string $locationId,
                           string $timezone,
                           ?string $phone = null,
                           ?string $skype = null,
                           ?string $whatsapp = null,
                           ?string $telegram = null,
                           ?string $password = null): User
    {
        $sendPassword = false;

        if (empty($password)) {
            $password = Factory::create()->password();
            $sendPassword = true;
        }

        $user = $this->userRepository->create(
            $name,
            $surname,
            $email,
            $password,
            $locationId,
            $timezone,
            $phone,
            $skype,
            $whatsapp,
            $telegram
        );

        if ($sendPassword) {
            // TODO Dispatch send password event
        }

        return $user;
    }

    public function update(string $id, array $data): User
    {
        return $this->userRepository->update($id, $data);
    }

    public function getById(string $id): User
    {
        return $this->userRepository->getById($id);
    }

    public function getByIds(array $ids): Collection
    {
        return $this->userRepository->getByIds($ids);
    }

    public function getByEmail(string $email): User
    {
        return $this->userRepository->getByEmail($email);
    }

    public function getAll(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->userRepository->getAllPaginated();
    }

    public function syncGroups(string $id, array $groupIds): bool
    {
        return $this->userRepository->syncGroups($id, $groupIds);
    }

    public function syncPermissions(string $id, array $permissions): bool
    {
        return $this->userRepository->syncPermissions($id, $permissions);
    }
}
