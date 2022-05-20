<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Group;
use Hito\Platform\Models\Team;
use Hito\Platform\Models\User;
use Hito\Platform\Services\GroupService;
use Hito\Platform\Services\PermissionService;
use Hito\Platform\Services\UserService;
use Hito\Platform\Services\TeamService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->authorizeResource(User::class);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $users = $this->userService->getAllPaginated();

        return view('hito::users-index', compact('users'));
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        $groups = $user->groups;
        $permissions = $user->permissions;

        return view('hito::users-show', compact('user', 'groups', 'permissions'));
    }
}
