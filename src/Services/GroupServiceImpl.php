<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Group;
use Hito\Platform\Repositories\GroupRepository;
use Illuminate\Support\Collection;

class GroupServiceImpl implements GroupService
{
    public function __construct(private GroupRepository $groupRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->groupRepository->getAll();
    }

    public function create(string $name, ?string $description = null, array $users = [], array $permissions = []): Group
    {
        return $this->groupRepository->create($name, $description, $users, $permissions);
    }

    public function update(string $id, array $data): void
    {
        $this->groupRepository->update($id, $data);
    }

    public function getById(string $id): Group
    {
        return $this->groupRepository->getById($id);
    }

    public function getByIds(array $ids): Collection
    {
        return $this->groupRepository->getByIds($ids);
    }

    public function syncUsers(string $id, array $userIds): bool
    {
        return $this->groupRepository->syncUsers($id, $userIds);
    }

    public function syncPermissions(string $id, array $permissions): bool
    {
        return $this->groupRepository->syncPermissions($id, $permissions);
    }
}
