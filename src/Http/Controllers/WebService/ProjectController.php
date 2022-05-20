<?php

namespace Hito\Platform\Http\Controllers\WebService;

use Hito\Platform\Http\Controllers\Controller;
use Hito\Platform\Services\RoleService;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function __construct(private RoleService $roleService)
    {
    }

    /**
     * @return JsonResponse
     */
    public function roles(): JsonResponse
    {
        return response()->json($this->roleService->getAllByType('project'));
    }
}
