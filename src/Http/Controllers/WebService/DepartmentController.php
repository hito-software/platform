<?php

namespace Hito\Platform\Http\Controllers\WebService;

use Hito\Platform\Http\Controllers\Controller;
use Hito\Platform\Services\DepartmentService;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    public function __construct(private DepartmentService $departmentService)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->departmentService->getAll());
    }
}
