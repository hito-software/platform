<div
    class="header-menu header-menu--mobile @if(empty($placeholder)) fixed @else invisible @endif">
    <div class="header-menu__topbar">
        <div class="flex items-center space-x-2">
            <div class="flex items-center space-x-2">
                <hito-sidenav-toggle></hito-sidenav-toggle>
            </div>
            <div class="hidden sm:block">
                <a href="{{ route('dashboard') }}" title="{{ config('app.name') }}">
                    <img src="{{ url('images/logo.svg') }}" alt=""
                         class="object-fit-contain" style="min-width: 80px; height: 50px;"/>
                </a>
            </div>
        </div>
        <div class="sm:hidden">
            <a href="{{ route('dashboard') }}" title="{{ config('app.name') }}">
                <img src="{{ url('images/logo.svg') }}" alt="" class="object-fit-contain"
                     style="min-width: 80px; height: 50px;"/>
            </a>
        </div>
        <div class="hidden sm:flex items-center justify-end space-x-2">
            <a href="{{ route('dashboard') }}" title="Dashboard"
               class="header-menu__icon {{ Route::is('dashboard') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
                <i class="fas fa-home header-menu__icon-size"></i></a>
            @can('viewAny', \Hito\Platform\Models\Announcement::class)
            <a href="{{ route('announcements.index') }}" title="Announcements"
               class="header-menu__icon {{ Route::is('announcements.*') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
                <i class="fas fa-bullhorn header-menu__icon-size"></i></a>
            @endcan
            <a href="#" title="Search"
               class="header-menu__icon {{ Route::is('search.*') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
                <i class="fas fa-search header-menu__icon-size"></i></a>
            <hito-chatnav-toggle></hito-chatnav-toggle>
            <a href="#"
               class="header-menu__icon">
                <i class="fas fa-bell text-3xl"></i>
            </a>
            <a href="{{ route('account.dashboard') }}">
                <x-hito::UserAvatar size="2.5rem" :user="auth()->user()"/>
            </a>
        </div>
    </div>
    <div class="flex items-center justify-evenly py-2 space-x-1 sm:hidden">
        <a href="{{ route('dashboard') }}" title="Dashboard"
           class="header-menu__icon header-menu__icon--block {{ Route::is('dashboard') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
            <i class="fas fa-home header-menu__icon-size"></i></a>
        @can('viewAny', \Hito\Platform\Models\Announcement::class)
        <a href="{{ route('announcements.index') }}" title="Announcements"
           class="header-menu__icon header-menu__icon--block {{ Route::is('announcements.*') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
            <i class="fas fa-bullhorn header-menu__icon-size"></i></a>
        @endcan
        <a href="#" title="Search"
           class="header-menu__icon header-menu__icon--block {{ Route::is('search.*') ? 'header-menu__icon--active' : '' }} flex items-center justify-center">
            <i class="fas fa-search header-menu__icon-size"></i></a>
        <hito-chatnav-toggle></hito-chatnav-toggle>
        <a href="#"
           class="header-menu__icon header-menu__icon--block">
            <i class="fas fa-bell text-3xl"></i>
        </a>
        <a href="{{ route('account.dashboard') }}">
            <x-hito::UserAvatar size="2.5rem" :user="auth()->user()"/>
        </a>
    </div>
</div>

<div
    class="header-menu header-menu--desktop @if(empty($placeholder)) xl:fixed @else invisible @endif">
    <div class="flex h-full flex-1">
        <div class="min-w-[125px] max-w-[250px] w-full h-full">
            <a href="{{ route('dashboard') }}" title="{{ config('app.name') }}"
               class="block h-full flex justify-center items-center py-2">
                <img src="{{ url('images/logo.svg') }}" alt=""
                     class="h-full object-fit-contain"/>
            </a>
        </div>
        <div class="grid grid-cols-3 items-center space-x-8 flex-1">
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" title="Dashboard"
                   class="w-[50px] h-[50px] block rounded-full {{ Route::is('dashboard') ? 'bg-blue-500 text-blue-100' : 'bg-gray-200 text-gray-400' }} flex items-center justify-center">
                    <i class="fas fa-home header-menu__icon-size"></i></a>
                @can('viewAny', \Hito\Platform\Models\Announcement::class)
                <a href="{{ route('announcements.index') }}" title="Announcements"
                   class="w-[50px] h-[50px] block rounded-full {{ Route::is('announcements.*') ? 'bg-blue-500 text-blue-100' : 'bg-gray-200 text-gray-400' }} flex items-center justify-center">
                    <i class="fas fa-bullhorn header-menu__icon-size"></i></a>
                @endcan
            </div>
            <div>
                <div class="relative w-full">
                    <div class="absolute top-0 left-0 h-full flex items-center justify-center px-2 text-gray-500">
                        <i class="fas fa-search"></i></div>
                    <input type="text" class="bg-gray-200 py-3 pl-8 pr-4 w-full rounded-lg"
                           placeholder="Search for anything..."/>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <div class="flex items-center space-x-2">
                    @if(empty($placeholder))
                        <turbo-frame id="notification_indicatior" data-turbo-permanent target="_top">
                            <hito-notification-icon url="{{ route('notifications.index') }}"></hito-notification-icon>
                        </turbo-frame>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="min-w-[125px] max-w-[250px] w-full">
        <div>
            <div class="flex items-center justify-center">
                <a href="{{ route('account.dashboard') }}"
                   class="flex items-center hover:shadow w-full mx-2 space-x-2 hover:bg-blue-500 rounded-lg p-2 text-gray-500 transition duration-100
                       hover:text-white font-bold cursor-pointer hover:bg-opacity-80">
                    <div>
                        <x-hito::UserAvatar size="2.5rem" :user="auth()->user()"/>
                    </div>
                    <div class="truncate">
                        {{ auth()->user()->full_name }}
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
