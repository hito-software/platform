<?php

namespace Hito\Platform\Providers;

use Hito\Core\Module\Facades\Menu;
use Hito\Platform\Models\Team;
use Hito\Platform\Services\ModuleService;
use Hito\Platform\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Route;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('hito::_shared.chat-sidebar', function ($view) {
            $userService = app(UserService::class);

            $authenticatedUser = auth()->user();
            $users = $userService->getAll()->filter(fn($user) => $user->id !== $authenticatedUser->id);


            $teams = Team::whereHas('members', function($query) use ($authenticatedUser) {
                $query->where('user_id', $authenticatedUser->id);
            })->get();

            $view->with(compact('users', 'teams'));
        });

        View::composer('hito::_layouts.app', function ($view) {
            $menuFilter = null;

            if (Route::is('admin.*')) {
                $menuFilter = 'admin';
            }

            $menus = Menu::getAllByUser(auth()->user(), $menuFilter);

            $view->with('menus', $menus);
        });
    }
}
