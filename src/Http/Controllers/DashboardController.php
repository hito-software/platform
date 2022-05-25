<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\User;
use Hito\Platform\Services\AnnouncementService;
use Hito\Platform\Services\UserService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function __construct(private readonly UserService $userService,
                                private readonly AnnouncementService $announcementService)
    {
    }

    /**
     * @return View
     */
    public function show(): View
    {
        $announcement = $this->announcementService->getLatest('pin_announcement');
        $statusList = $this->getStatusList();
        $todayBirthdays = $this->getTodaysBirthdays();
        $monthBirthdays = $this->getCurrentMonthBirthdays();

        return view('hito::dashboard', compact('statusList', 'todayBirthdays', 'monthBirthdays', 'announcement'));
    }

    /**
     * @return Collection
     * @throws Exception
     */
    private function getStatusList(): Collection
    {
        $users = $this->userService->getAll();
        $totalUsers = $users->count();
        return $users->random(random_int(0, $totalUsers));
    }

    /**
     * @return Collection
     * @throws Exception
     */
    private function getTodaysBirthdays(): Collection
    {
        $location = auth()->user()->location_id;

        if (is_null($location)) {
            return collect(); // @phpstan-ignore-line
        }

        return User::whereDate('birthdate', now())
            ->where('location_id', $location)->get();
    }

    /**
     * @return Collection
     * @throws Exception
     */
    private function getCurrentMonthBirthdays(): Collection
    {
        $location = auth()->user()->location_id;

        if (is_null($location)) {
            return collect(); // @phpstan-ignore-line
        }

        return User::whereBetween('birthdate', [now(), now()->endOfMonth()])
            ->where('location_id', $location)
            ->get();
    }
}
