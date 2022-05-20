<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface AnnouncementRepository
{
    public function getById(string $id): Announcement;

    public function create(string $name, string $description, string $content, Carbon $publishedAt,
                           ?Carbon $startAt = null, ?Carbon $endAt = null, array $locations = []): Announcement;

    public function delete(string $id): void;

    public function update(string $id, array $data, ?array $locations = []): Announcement;

    public function getPaginated(?string $filter = null, array $exclude = [], string $orderBy = 'published_at',
                                 string $orderDirection = 'DESC'): LengthAwarePaginator;

    public function getAll(?string $filter = null): Collection;

    public function getLatest(?string $filter = null): Announcement|null;

    public function markAsRead(string $id, string $userUuid): void;
}
