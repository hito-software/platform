<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Procedure;
use Hito\Platform\Repositories\ProcedureRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProcedureServiceImpl implements ProcedureService
{
    public function __construct(private readonly ProcedureRepository $procedureRepository)
    {
    }

    public function getById(string $id): Procedure
    {
        return $this->procedureRepository->getById($id);
    }

    public function create(string $name,
                           string $description,
                           string $content,
                           string $status,
                           ?Carbon $publishedAt = null,
                           ?array $locations = []): Procedure
    {
        if ($status === 'DRAFT') {
            $publishedAt = null;
        } else {
            $publishedAt = now();
        }

        return $this->procedureRepository->create($name, $description, $content, $status, $publishedAt, $locations);
    }

    public function delete(string $id): void
    {
        $this->procedureRepository->delete($id);
    }

    public function update(string $id, array $data): Procedure
    {
        return $this->procedureRepository->update($id, $data);
    }

    public function getPaginated( ?string $status = null): LengthAwarePaginator
    {
        return $this->procedureRepository->getPaginated( $status);
    }

    public function getLatest(): Procedure|null
    {
        return $this->procedureRepository->getLatest();
    }

    public function markAsRead(string $id, string $userUuid): void
    {
        $this->procedureRepository->markAsRead($id, $userUuid);
    }
}
