<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepositoryImpl implements DepartmentRepository
{
    public function create(string $name, ?string $description = null, array $members = []): Department
    {
        $department = Department::create(compact('name', 'description'));
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
        $department = $this->getById($id);
        $department->update(\Arr::except($data, ['members']));
        $department->users()->sync(\Arr::get($data, 'members', []));
    }

    public function syncUsers(string $id, array $userIds): bool
    {
        $department = $this->getById($id);
        $department->users()->sync($userIds);

        return true;
    }
}
