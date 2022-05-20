<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Services\NotificationService;

class NotificationController extends Controller
{
    public function __construct(private NotificationService $notificationService)
    {
    }

    public function index()
    {
        $notifications = $this->notificationService->getAllPaginatedByUser(auth()->user()->id);

        return view('notifications.index', compact('notifications'));
    }
}
