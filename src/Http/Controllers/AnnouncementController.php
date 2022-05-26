<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Announcement;
use Hito\Platform\Services\AnnouncementService;
use Illuminate\Contracts\View\View;

class AnnouncementController extends Controller
{
    public function __construct(private readonly AnnouncementService $announcementService)
    {
        $announcementClass = Announcement::class;
        $this->middleware("can:view,{$announcementClass}")->only(['index']);
    }

    /**
     * @return View
     */
    public function index()
    {
        $pinned = $this->announcementService->getAll('pinned');
        $announcements = $this->announcementService->getPaginated('published', $pinned->pluck('id')->toArray());

        return view('hito::announcements-index', compact('pinned', 'announcements'));
    }

    /**
     * @param Announcement $announcement
     * @return View
     */
    public function show(Announcement $announcement)
    {
        $this->authorize('view',$announcement);
        return view('hito::announcements-show', compact('announcement'));
    }
}
