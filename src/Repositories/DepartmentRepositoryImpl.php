<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepositoryImpl implements DepartmentRepository
{
    public function create(array $data): Department
    {
        $members = [];
        if (!empty($data['members'])) {
            $members = $data['members'];
            unset($data['members']);
        }

        $department = Department::create($data);
        $department->users()->sync($members);

        return $department;
    }

    public function getById(string $id): Department
    {
        return Department::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Department::all();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Department::paginate();
    }

    public function update(string $id, array $data): void
    {
        $members = [];
        if (!empty($data['members'])) {
            $members = $data['members'];
            unset($data['members']);
        }
        $department = $this->getById($id);
        $department->users()->sync($members);
        Department::findOrFail($id)->update($data);

    }

    public function syncUsers(string $id, array $userIds): bool
    {
        $department = $this->getById($id);
        $department->users()->sync($userIds);

        return true;
    }
}
