<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface DepartmentService
{
    public function create(string $name, string $description, array $members = []): Department;

    public function getById(string $id): Department;

    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function update(string $id, array $data): void;

    public function syncUsers(string $id, array $userIds): bool;
}
