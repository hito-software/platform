<?php

namespace Hito\Platform\Services;

use Hito\Platform\Contracts\ViewNotification;
use Hito\Platform\DTO\NotificationDTO;
use Hito\Platform\Repositories\NotificationRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Notifications\DatabaseNotification;

class NotificationServiceImpl implements NotificationService
{
    public function __construct(private NotificationRepository $notificationRepository)
    {
    }

    public function getAllPaginatedByUser(string $userId): LengthAwarePaginator
    {
        $notifications = $this->notificationRepository->getAllPaginatedByUser($userId);
        $notifications->each(function ($notification) {
            $notification->view = $this->getViewData($notification);
        });

        return $notifications;
    }

    private function getViewData(DatabaseNotification $notification): ?NotificationDTO
    {
        $className = $notification->type;

        if (!class_exists($className)) {
            return null;
        }

        if (array_search(ViewNotification::class, class_implements($className)) === false) {
            return null;
        }

        return $className::toView($notification);
    }
}
