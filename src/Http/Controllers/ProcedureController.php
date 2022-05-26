<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Procedure;
use Hito\Platform\Services\ProcedureService;
use Illuminate\Contracts\View\View;

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
    public function index()
    {
        $procedures = $this->procedureService->getPaginated('PUBLISHED');

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
