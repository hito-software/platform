<?php

namespace Hito\Platform\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NotificationRepositoryImpl implements NotificationRepository
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function getAllPaginatedByUser(string $userId): LengthAwarePaginator
    {
        $user = $this->userRepository->getById($userId);

        return $user->notifications()->paginate();
    }
}
