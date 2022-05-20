<?php


namespace Hito\Platform\Services;

use Hito\Platform\Models\Permission;
use Hito\Platform\Repositories\PermissionRepository;
use Illuminate\Support\Collection;

class PermissionServiceImpl implements PermissionService
{
    public function __construct(private PermissionRepository $permissionRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->permissionRepository->getAll();
    }

    public function create(string $name): \Spatie\Permission\Contracts\Permission
    {
        return $this->permissionRepository->create($name);
    }

    public function getByName(string $name): Permission
    {
        return $this->permissionRepository->getByName($name);
    }

    public function update(array $data, string $name): Permission
    {
        return $this->permissionRepository->update($data, $name);
    }

    public function destroy(string $name): bool
    {
        return $this->permissionRepository->destroy($name);
    }
}
