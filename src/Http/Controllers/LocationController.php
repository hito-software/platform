<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Location;
use Hito\Platform\Services\LocationService;
use Illuminate\Contracts\View\View;

class LocationController extends Controller
{
    public function __construct(private LocationService $locationService)
    {
        $this->authorizeResource(Location::class);;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $locations = $this->locationService->getAllPaginated();

        return view('hito::locations-index', compact('locations'));
    }

    /**
     * @param Location $location
     * @return View
     */
    public function show(Location $location): View
    {
        $users = $location->users;

        return view('hito::locations-show', compact('location', 'users'));
    }
}
