<?php

namespace Hito\Platform\Providers;

use Hito\Core\Module\DTO\MenuDTO;
use Hito\Core\Module\DTO\MenuItemDTO;
use Hito\Core\Module\Facades\Menu;
use Hito\Platform\Models\Announcement;
use Hito\Platform\Models\Client;
use Hito\Platform\Models\Department;
use Hito\Platform\Models\Group;
use Hito\Platform\Models\Location;
use Hito\Platform\Models\Procedure;
use Hito\Platform\Models\Project;
use Hito\Platform\Models\Team;
use Hito\Platform\Models\User;
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
                $this->createAdminMenus();
            } else {
                $this->createPublicMenus();
            }

            $menus = Menu::getAllByUser(auth()->user(), $menuFilter);

            $view->with('menus', $menus);
        });
    }

    private function createPublicMenus(): void
    {
        $menu = new MenuDTO('company', 'Company', 'fas fa-users', order: 99999);
        $menu->addItem(new MenuItemDTO('Announcements', 'announcements.index', 'fas fa-bullhorn',  ['viewAny', Announcement::class]));
        $menu->addItem(new MenuItemDTO('Procedures', 'procedures.index', 'fas fa-book', ['viewAny', Procedure::class]));
        $menu->addItem(new MenuItemDTO('Departments', 'departments.index', 'fas fa-users', ['viewAny', Department::class]));
        $menu->addItem(new MenuItemDTO('Users', 'users.index', 'fas fa-box', ['viewAny', User::class]));
        $menu->addItem(new MenuItemDTO('Teams', 'teams.index', 'fas fa-box', ['viewAny', Team::class]));
        $menu->addItem(new MenuItemDTO('Projects', 'projects.index', 'fas fa-box', ['viewAny', Project::class]));
        $menu->addItem(new MenuItemDTO('Locations', 'locations.index', 'fas fa-map-marker-alt', ['viewAny', Location::class]));
        $menu->addItem(new MenuItemDTO('Clients', 'clients.index', 'fas fa-user-tie', ['viewAny', Client::class]));
        Menu::add($menu);
    }

    private function createAdminMenus(): void
    {
        $menu = new MenuDTO('company', 'Company', 'fas fa-bullhorn', order: 99999, group: 'admin');
        $menu->addItem(new MenuItemDTO('Announcements', 'admin.announcements.index', 'fas fa-bullhorn', ['viewAny', Announcement::class]));
        $menu->addItem(new MenuItemDTO('Procedures', 'admin.procedures.index', 'fas fa-book', ['viewAny', Procedure::class]));
        $menu->addItem(new MenuItemDTO('Locations', 'admin.locations.index', 'fas fa-map-marker-alt', ['viewAny', Location::class]));
        $menu->addItem(new MenuItemDTO('Departments', 'admin.departments.index', 'fas fa-users', ['viewAny', Department::class]));
        $menu->addItem(new MenuItemDTO('Clients', 'admin.clients.index', 'fas fa-user-tie', ['viewAny', Client::class]));
        $menu->addItem(new MenuItemDTO('Projects', 'admin.projects.index', 'fas fa-toolbox', ['viewAny', Project::class]));
        $menu->addItem(new MenuItemDTO('Teams', 'admin.teams.index', 'fas fa-users-cog', ['viewAny', Team::class]));
        Menu::add($menu);

        $menu = new MenuDTO('access-management', 'Access management', 'fas fa-users', order: 99999, group: 'admin');
        $menu->addItem(new MenuItemDTO('Users', 'admin.users.index', 'fas fa-box', ['viewAny', User::class]));
        $menu->addItem(new MenuItemDTO('Groups', 'admin.groups.index', 'fas fa-box', ['viewAny', Group::class]));
        Menu::add($menu);

        $menu = new MenuDTO('configuration', 'Configuration', 'fas fa-cogs', order: 99999, group: 'admin');
        $menu->addItem(new MenuItemDTO('Modules', 'admin.modules.index', 'fas fa-box', 'config.view'));
        $menu->addItem(new MenuItemDTO('Import data', 'admin.import.index', 'fas fa-file-upload', 'import.view'));
        Menu::add($menu);
    }
}
