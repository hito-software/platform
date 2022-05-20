<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Services\ModuleService;
use Illuminate\Http\Response;

class AssetController extends Controller
{
    public function __construct(private ModuleService $moduleService)
    {
    }

    public function asset(string $module, string $path): Response
    {
        return $this->moduleService->getAssetResponseByModule(request(), $module, $path);
    }
}
