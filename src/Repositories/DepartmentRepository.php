<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface DepartmentRepository
{
    public function create(string $name, ?string $description = null, array $members = []): Department;

    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function getById(string $id): Department;

    public function update(string $id, array $data): void;

    public function syncUsers(string $id, array $userIds): bool;
}
