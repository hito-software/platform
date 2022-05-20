<?php

namespace Hito\Platform\Providers;

use Hito\Platform\Repositories\AnnouncementRepository;
use Hito\Platform\Repositories\AnnouncementRepositoryImpl;
use Hito\Platform\Repositories\ClientRepository;
use Hito\Platform\Repositories\ClientRepositoryImpl;
use Hito\Platform\Repositories\ComposerRepository;
use Hito\Platform\Repositories\ComposerRepositoryImpl;
use Hito\Platform\Repositories\CountryRepository;
use Hito\Platform\Repositories\CountryRepositoryImpl;
use Hito\Platform\Repositories\DepartmentRepository;
use Hito\Platform\Repositories\DepartmentRepositoryImpl;
use Hito\Platform\Repositories\GroupRepository;
use Hito\Platform\Repositories\GroupRepositoryImpl;
use Hito\Platform\Repositories\LocationRepository;
use Hito\Platform\Repositories\LocationRepositoryImpl;
use Hito\Platform\Repositories\NotificationRepository;
use Hito\Platform\Repositories\NotificationRepositoryImpl;
use Hito\Platform\Repositories\PermissionRepository;
use Hito\Platform\Repositories\PermissionRepositoryImpl;
use Hito\Platform\Repositories\ProcedureRepository;
use Hito\Platform\Repositories\ProcedureRepositoryImpl;
use Hito\Platform\Repositories\ProjectRepository;
use Hito\Platform\Repositories\ProjectRepositoryImpl;
use Hito\Platform\Repositories\RoleRepository;
use Hito\Platform\Repositories\RoleRepositoryImpl;
use Hito\Platform\Repositories\TeamRepository;
use Hito\Platform\Repositories\TeamRepositoryImpl;
use Hito\Platform\Repositories\UserRepository;
use Hito\Platform\Repositories\UserRepositoryImpl;
use Hito\Platform\Services\AnnouncementService;
use Hito\Platform\Services\AnnouncementServiceImpl;
use Hito\Platform\Services\ClientService;
use Hito\Platform\Services\ClientServiceImpl;
use Hito\Platform\Services\ComposerService;
use Hito\Platform\Services\ComposerServiceImpl;
use Hito\Platform\Services\CountryService;
use Hito\Platform\Services\CountryServiceImpl;
use Hito\Platform\Services\DepartmentService;
use Hito\Platform\Services\DepartmentServiceImpl;
use Hito\Platform\Services\GroupService;
use Hito\Platform\Services\GroupServiceImpl;
use Hito\Platform\Services\ImportService;
use Hito\Platform\Services\ImportServiceImpl;
use Hito\Platform\Services\LocationService;
use Hito\Platform\Services\LocationServiceImpl;
use Hito\Platform\Services\NotificationService;
use Hito\Platform\Services\NotificationServiceImpl;
use Hito\Platform\Services\PermissionService;
use Hito\Platform\Services\PermissionServiceImpl;
use Hito\Platform\Services\ProcedureService;
use Hito\Platform\Services\ProcedureServiceImpl;
use Hito\Platform\Services\ProjectService;
use Hito\Platform\Services\ProjectServiceImpl;
use Hito\Platform\Services\RoleService;
use Hito\Platform\Services\RoleServiceImpl;
use Hito\Platform\Services\TeamService;
use Hito\Platform\Services\TeamServiceImpl;
use Hito\Platform\Services\UserService;
use Hito\Platform\Services\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Repositories
        TeamRepository::class => TeamRepositoryImpl::class,
        ProjectRepository::class => ProjectRepositoryImpl::class,
        ClientRepository::class => ClientRepositoryImpl::class,
        CountryRepository::class => CountryRepositoryImpl::class,
        DepartmentRepository::class => DepartmentRepositoryImpl::class,
        UserRepository::class => UserRepositoryImpl::class,
        RoleRepository::class => RoleRepositoryImpl::class,
        GroupRepository::class => GroupRepositoryImpl::class,
        PermissionRepository::class => PermissionRepositoryImpl::class,
        AnnouncementRepository::class => AnnouncementRepositoryImpl::class,
        ProcedureRepository::class => ProcedureRepositoryImpl::class,
        ComposerRepository::class => ComposerRepositoryImpl::class,
        LocationRepository::class => LocationRepositoryImpl::class,
        NotificationRepository::class => NotificationRepositoryImpl::class,

        // Services
        TeamService::class => TeamServiceImpl::class,
        ProjectService::class => ProjectServiceImpl::class,
        ClientService::class => ClientServiceImpl::class,
        CountryService::class => CountryServiceImpl::class,
        DepartmentService::class => DepartmentServiceImpl::class,
        UserService::class => UserServiceImpl::class,
        RoleService::class => RoleServiceImpl::class,
        GroupService::class => GroupServiceImpl::class,
        PermissionService::class => PermissionServiceImpl::class,
        ImportService::class => ImportServiceImpl::class,
        AnnouncementService::class => AnnouncementServiceImpl::class,
        ProcedureService::class => ProcedureServiceImpl::class,
        ComposerService::class => ComposerServiceImpl::class,
        LocationService::class => LocationServiceImpl::class,
        NotificationService::class => NotificationServiceImpl::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
