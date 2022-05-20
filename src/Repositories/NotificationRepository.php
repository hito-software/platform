<?php

namespace Hito\Platform\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface NotificationRepository
{
    public function getAllPaginatedByUser(string $userId): LengthAwarePaginator;
}
