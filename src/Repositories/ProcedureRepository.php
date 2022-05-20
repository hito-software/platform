<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProcedureRepository
{
    public function getById(string $id): Procedure;

    public function create(string $name, string $description, string $content, string $status,
                           ?Carbon $publishedAt = null, ?array $locations = []): Procedure;

    public function delete(string $id): void;

    public function update(string $id, array $data, ?array $locations = []): Procedure;

    public function getPaginated( ?string $status = null): LengthAwarePaginator;

    public function getLatest(): Procedure|null;

    public function markAsRead(string $id, string $userUuid): void;
}
