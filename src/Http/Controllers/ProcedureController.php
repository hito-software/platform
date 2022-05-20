<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Procedure;
use Hito\Platform\Services\ProcedureService;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProcedureController extends Controller
{
    public function __construct(private readonly ProcedureService $procedureService)
    {
        $procedureClass = Procedure::class;
        $this->middleware("can:view,{$procedureClass}")->only(['index']);
    }

    /**
     * @return View
     */
    public function index(Procedure $procedure)
    {
        $canEdit = auth()->user()->can('update', $procedure);
        $canCreate = auth()->user()->can('create', $procedure);

        $status = 'PUBLISHED';

        if ($canEdit || $canCreate) {
            $status = null;
        }

        $procedures = $this->procedureService->getPaginated($status);

        return view('hito::procedures-index', compact('procedures'));
    }

    /**
     * @param Procedure $procedure
     * @return View
     */
    public function show(Procedure $procedure)
    {
        return view('hito::procedures-show', compact('procedure'));
    }
}
