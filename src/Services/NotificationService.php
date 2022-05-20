<?php

namespace Hito\Platform\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface NotificationService
{
    public function getAllPaginatedByUser(string $userId): LengthAwarePaginator;
}
