<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Department;
use Hito\Platform\Repositories\DepartmentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DepartmentServiceImpl implements DepartmentService
{
    public function __construct(private DepartmentRepository $departmentRepository)
    {
    }

    public function create(string $name, string $description, array $members = []): Department
    {
        return $this->departmentRepository->create($name, $description, $members);
    }

    public function getById(string $id): Department
    {
        return $this->departmentRepository->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->departmentRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->departmentRepository->getAllPaginated();
    }

    public function update(string $id, array $data): void
    {
        $this->departmentRepository->update($id, $data);
    }

    public function syncUsers(string $id, array $userIds): bool
    {
        return $this->departmentRepository->syncUsers($id, $userIds);
    }
}
