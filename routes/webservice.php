<?php

use Hito\Platform\Http\Controllers\WebService\DepartmentController;
use Hito\Platform\Http\Controllers\WebService\ProjectController;
use Hito\Platform\Http\Controllers\WebService\TeamController;
use Hito\Platform\Http\Controllers\WebService\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::resource('users', UserController::class)->only(['index', 'update']);

    Route::get('/project-roles', [ProjectController::class, 'roles'])->name('project-roles.index');
    Route::get('/team-roles', [TeamController::class, 'roles'])->name('team-roles.index');
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
});
