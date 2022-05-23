<?php

use Hito\Platform\Http\Controllers\AccountController;
use Hito\Platform\Http\Controllers\AnnouncementController;
use Hito\Platform\Http\Controllers\ClientController;
use Hito\Platform\Http\Controllers\DashboardController;
use Hito\Platform\Http\Controllers\DepartmentController;
use Hito\Platform\Http\Controllers\LocationController;
use Hito\Platform\Http\Controllers\NotificationController;
use Hito\Platform\Http\Controllers\ProcedureController;
use Hito\Platform\Http\Controllers\ProjectController;
use Hito\Platform\Http\Controllers\TeamController;
use Hito\Platform\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(static function () {
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.index');

    Route::prefix('announcements')->name('announcements.')->group(static function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('index');
        Route::get('/{announcement}', [AnnouncementController::class, 'show'])
            ->name('show');
    });

    Route::prefix('procedures')->name('procedures.')->group(static function () {
        Route::get('/', [ProcedureController::class, 'index'])->name('index');
        Route::get('/{procedure}', [ProcedureController::class, 'show'])
            ->name('show');
    });

    Route::prefix('teams')->name('teams.')->group(static function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/{team}', [TeamController::class, 'show'])
            ->name('show');
    });

    Route::prefix('locations')->name('locations.')->group(static function () {
        Route::get('/', [LocationController::class, 'index'])->name('index');
        Route::get('/{location}', [LocationController::class, 'show'])
            ->name('show');
    });

    Route::prefix('projects')->name('projects.')->group(static function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/{project}', [ProjectController::class, 'show'])
            ->name('show');
    });

    Route::prefix('clients')->name('clients.')->group(static function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/{client}', [ClientController::class, 'show'])
            ->name('show');
    });

    Route::prefix('departments')->name('departments.')->group(static function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::get('/{department}', [DepartmentController::class, 'show'])
            ->name('show');
    });

    Route::prefix('account')->name('account.')->group(static function () {
        Route::get('/', [AccountController::class, 'dashboard'])->name('dashboard');

        Route::get('/edit-profile', [AccountController::class, 'editProfile'])
            ->name('edit-profile');

        Route::patch('/update-profile', [AccountController::class, 'updateProfile'])
            ->name('update-profile');

        Route::get('/edit-password', [AccountController::class, 'editPassword'])
            ->name('edit-password');

        Route::patch('/edit-password', [AccountController::class, 'updatePassword'])
            ->name('update-password');
    });

    Route::prefix('users')->name('users.')->group(static function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
    });
});
