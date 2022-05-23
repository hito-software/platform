<?php


namespace Hito\Platform\Services;


use Hito\Platform\Models\Group;
use Illuminate\Support\Collection;

interface GroupService
{
    public function getAll(): Collection;

    public function create(string $name, string $description, array $users = [], array $permissions = []): Group;

    public function update(string $id, array $data): void;

    public function getById(string $id): Group;

    public function getByIds(array $ids): Collection;

    public function syncUsers(string $id, array $userIds): bool;

    public function syncPermissions(string $id, array $permissions): bool;
}
