<?php

namespace Hito\Platform\Providers;

use Hito\Core\Module\DTO\MenuDTO;
use Hito\Core\Module\DTO\MenuItemDTO;
use Hito\Core\Module\Facades\Menu;
use Hito\Platform\Models\Announcement;
use Hito\Platform\Models\Department;
use Hito\Platform\Models\Group;
use Hito\Platform\Models\Location;
use Hito\Platform\Models\Procedure;
use Hito\Platform\Models\Team;
use Hito\Platform\Models\Client;
use Hito\Platform\Models\User;
use Hito\Platform\Models\Project;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->createPublicMenus();
        $this->createAccountMenus();
        $this->createAdminMenus();
    }

    private function createPublicMenus()
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

    private function createAccountMenus()
    {
        $menu = new MenuDTO('general', 'General', 'fas fa-users', order: 1, group: 'account');
        $menu->addItem(new MenuItemDTO('Account information', 'account.edit-profile', 'fas fa-user', 'users.update-own'));
        Menu::add($menu);

        $menu = new MenuDTO('security', 'Security', 'fas fa-users', order: 2, group: 'account');
        $menu->addItem(new MenuItemDTO('Password', 'account.edit-password', 'fas fa-unlock',
            'users.update-own'));
        $menu->addItem(new MenuItemDTO('Two factor authentication', 'account.dashboard',
            'fas fa-fingerprint', 'users.update-own'));
        Menu::add($menu);

        $menu = new MenuDTO('other', 'Other', 'fas fa-users', order: 3, group: 'account');
        $menu->addItem(new MenuItemDTO('Notifications', 'notifications.index', 'fas fa-bell'));
        $menu->addItem(new MenuItemDTO('Help', 'account.dashboard', 'fas fa-question-circle'));
        $menu->addItem(new MenuItemDTO('Logout', 'auth.logout', 'fas fa-sign-out-alt'));
        Menu::add($menu);
    }

    private function createAdminMenus()
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
