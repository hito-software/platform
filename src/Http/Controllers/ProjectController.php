<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Project;
use Hito\Platform\Services\ClientService;
use Hito\Platform\Services\CountryService;
use Hito\Platform\Services\ProjectService;
use Hito\Platform\Services\RoleService;
use Hito\Platform\Services\TeamService;
use Hito\Platform\Services\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $projectService,
                                private RoleService    $roleService)
    {
        $this->authorizeResource(Project::class);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $projects = $this->projectService->getAllPaginated();

        return view('hito::projects-index', compact('projects'));
    }

    /**
     * @param Project $project
     * @return View
     */
    public function show(Project $project): View
    {
        $client = $project->client;
        $country = $project->country;
        $roles = $this->roleService->getAllByType('project');
        $members = $project->members;
        $teams = $project->teams;

        return view('hito::projects-show', compact('project', 'client', 'country', 'roles',
            'members', 'teams'));
    }
}

