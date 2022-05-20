<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Group;
use Illuminate\Database\Eloquent\Collection;

interface GroupRepository
{
    public function getAll(): Collection;

    public function create(array $data): Group;

    public function update(string $id, array $data): void;

    public function getById(string $id): Group;

    public function getByIds(array $ids): Collection;

    public function syncUsers(string $id, array $userIds): bool;

    public function syncPermissions(string $id, array $permissions): bool;
}
