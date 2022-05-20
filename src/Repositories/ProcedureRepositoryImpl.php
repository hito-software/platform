<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProcedureRepositoryImpl implements ProcedureRepository
{
    public function getById(string $id): Procedure
    {
        return Procedure::findOrFail($id);
    }

    public function create(string $name, string $description, string $content, string $status,
                           ?Carbon $publishedAt = null, ?array $locations = []): Procedure
    {
        $procedure = Procedure::create([
            ...compact('name', 'description', 'content', 'status'),
            ...['published_at' => $publishedAt]
        ]);

        $procedure->locations()->sync($locations);

        return $procedure;
    }

    public function delete(string $id): void
    {
        Procedure::findOrFail($id)->delete();
    }

    public function update(string $id, array $data, ?array $locations = []): Procedure
    {
        $model = $this->getById($id);
        $model->update($data);

        $model->locations()->sync($locations);

        return $model;
    }

    public function getPaginated(?string $status = null): LengthAwarePaginator
    {
        $query = Procedure::query();

        if ($status === 'PUBLISHED') {
            $query->where('status', 'PUBLISHED')->paginate();
        }
        if ($status === 'DRAFT'){
            $query->where('status', 'DRAFT')->paginate();
        }

        return $query->paginate();
    }

    public function getLatest(): Procedure|null
    {
        return Procedure::limit(1)->orderBy('published_at', 'desc')->first();
    }

    public function markAsRead(string $id, string $userUuid): void
    {
        // TODO: Implement markAsRead() method.
    }
}
