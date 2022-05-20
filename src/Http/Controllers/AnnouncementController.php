<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Announcement;
use Hito\Platform\Services\AnnouncementService;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $canCreate = auth()->user()->can('create', Announcement::class);
        $canEdit = auth()->user()->can('edit', Announcement::class);
        $filter = null;

        if (!($canCreate || $canEdit)) {
            $filter = 'published';
        }

        $pinned = $this->announcementService->getAll('pinned');
        $announcements = $this->announcementService->getPaginated($filter, $pinned->pluck('id')->toArray());

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
