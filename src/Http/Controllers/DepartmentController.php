<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Department;
use Hito\Platform\Services\DepartmentService;
use Hito\Platform\Services\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    public function __construct(private DepartmentService $departmentService)
    {
        $departmentClass = Department::class;
        $this->middleware("can:departments.view,{$departmentClass}")->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $departments = $this->departmentService->getAllPaginated();

        return view('hito::departments-index', compact('departments'));
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function show(Department $department): View
    {
        $users = $department->users;

        return view('hito::departments-show', compact('department', 'users'));
    }
}
