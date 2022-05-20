<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Announcement;
use Hito\Platform\Repositories\AnnouncementRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AnnouncementServiceImpl implements AnnouncementService
{
    public function __construct(private readonly AnnouncementRepository $announcementRepository)
    {
    }

    public function getById(string $id): Announcement
    {
        return $this->announcementRepository->getById($id);
    }

    public function create(string $name, string $description, string $content, ?Carbon $publishedAt = null,
                           ?Carbon $startAt = null, ?Carbon $endAt = null, array $locations = []): Announcement
    {
        if (is_null($publishedAt)) {
            $publishedAt = now();
        }

        return $this->announcementRepository->create($name, $description, $content, $publishedAt, $startAt, $endAt,
            $locations);
    }

    public function delete(string $id): void
    {
        $this->announcementRepository->delete($id);
    }

    public function update(string $id, array $data, ?array $locations = []): Announcement
    {
        return $this->announcementRepository->update($id, $data, $locations);
    }

    public function getPaginated(?string $filter = null, array $exclude = [], string $orderBy = 'published_at',
                                 string $orderDirection = 'DESC'): LengthAwarePaginator
    {
        return $this->announcementRepository->getPaginated($filter, $exclude, $orderBy, $orderDirection);
    }

    public function getAll(?string $filter = null): Collection
    {
        return $this->announcementRepository->getAll($filter);
    }


    public function getLatest(?string $filter = null): Announcement|null
    {
        return $this->announcementRepository->getLatest($filter);
    }

    public function markAsRead(string $id, string $userUuid): void
    {
        $this->announcementRepository->markAsRead($id, $userUuid);
    }
}
