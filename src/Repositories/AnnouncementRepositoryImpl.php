<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AnnouncementRepositoryImpl implements AnnouncementRepository
{
    public function getById(string $id): Announcement
    {
        return \Cache::remember("announcement-{$id}", now()->addDays(7), fn() => Announcement::findOrFail($id));
    }

    public function create(string $name,
                           string $description,
                           string $content,
                           Carbon $publishedAt,
                           ?Carbon $startAt = null,
                           ?Carbon $endAt = null,
                           array $locations = [],
                           ?string $userId = null): Announcement
    {
        $announcement = Announcement::create([
            ...compact('name', 'description', 'content'),
            ...[
                'published_at' => $publishedAt,
                'pin_start_at' => $startAt,
                'pin_end_at' => $endAt,
                'user_id' => $userId
            ]
        ]);

        $announcement->locations()->sync($locations);

        return $announcement;
    }

    public function delete(string $id): void
    {
        Announcement::findOrFail($id)->delete();
    }

    public function update(string $id, array $data): Announcement
    {
        $model = $this->getById($id);
        $model->update(\Arr::except($data, ['locations']));

        $model->locations()->sync(\Arr::get($data, 'locations', []));

        return $model;
    }

    public function getPaginated(?string $filter = null, array $exclude = [], string $orderBy = 'published_at',
                                 string $orderDirection = 'DESC'): LengthAwarePaginator
    {
        $query = Announcement::query();

        if ($filter === 'published') {
            $currentDate = now();
            $query->whereTime('published_at', '<=', $currentDate);
            $query->whereDate('published_at', '<=', $currentDate);
        }

        $query->orderBy($orderBy, $orderDirection);

        return $query->whereNotIn('id', $exclude)->paginate();
    }

    public function getAll(?string $filter = null): Collection
    {
        $query = Announcement::query();

        if ($filter === 'pinned') {
            $currentDate = now();

            $query->where('published_at', '<=', $currentDate);

            $query->where(function ($query) use($currentDate) {
                $query->where('pin_start_at', '<=', $currentDate);
                $query->where('pin_end_at', '>=', $currentDate);
            });

            $query->orWhere(function ($query) use($currentDate) {
                $query->where('pin_start_at', '<=', $currentDate);
                $query->whereNull('pin_end_at');
            });

            $query->orderBy('pin_start_at', 'DESC');
        } else {
            $query->orderBy('published_at', 'DESC');
        }

        return $query->get();
    }

    public function getLatest(?string $filter = null): Announcement|null
    {
        $query = Announcement::query();

        if ($filter === 'pin_announcement') {
            $currentDate = now();

            $query->where(function ($query) use($currentDate) {
                $query->where('pin_start_at', '<=', $currentDate);
                $query->where('pin_end_at', '>=', $currentDate);
            });

            $query->orWhere(function ($query) use($currentDate) {
                $query->where('pin_start_at', '<=', $currentDate);
                $query->whereNull('pin_end_at');
            });

            $query->orderBy('pin_start_at', 'DESC');
        } else {
            $query->orderBy('published_at', 'DESC');
        }

        return $query->limit(1)->first();
    }

    public function markAsRead(string $id, string $userUuid): void
    {
        // TODO: Implement markAsRead() method.
    }
}
