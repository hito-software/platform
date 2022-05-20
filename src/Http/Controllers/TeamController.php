<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Team;
use Hito\Platform\Services\ProjectService;
use Hito\Platform\Services\RoleService;
use Hito\Platform\Services\TeamService;
use Hito\Platform\Services\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
    public function __construct(private TeamService    $teamService,
                                private RoleService    $roleService)
    {
        $this->authorizeResource(Team::class);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $teams = $this->teamService->getAllPaginated();

        return view('hito::teams-index', compact('teams'));
    }

    /**
     * @param Team $team
     * @return View
     */
    public function show(Team $team): View
    {
        $roles = $this->roleService->getAllByType('team');
        $members = $team->members;
        $projects = $team->projects;

        return view('hito::teams-show', compact('team', 'roles', 'members', 'projects'));
    }
}
