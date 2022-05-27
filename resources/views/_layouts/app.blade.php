@extends('hito::_layouts.base')

@prepend('head')
    <meta name="user-id" content="{{ auth()->id() }}">
@endprepend

@prepend('css')
    <link rel="stylesheet" href="{{ asset('hito/platform/css/style.css') }}"/>
@endprepend

@prepend('js')
    <script>
        window._locale = '{{ \App::currentLocale() }}';
        window._translations = @json(cache('translations')?->get(\App::currentLocale()) ?? []);
    </script>
    <script src="{{ asset('hito/platform/js/manifest.js') }}" defer></script>
    <script src="{{ asset('hito/platform/js/vendor.js') }}" defer></script>
    <script src="{{ asset('hito/platform/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('hito/platform/js/bootstrap-app.js') }}" defer></script>
    <script src="{{ asset('hito/platform/js/bootstrap-react.js') }}" defer></script>
    <script src="{{ asset('hito/platform/js/app.js') }}" defer></script>
@endprepend

@section('content')
    @if (auth()->user()->timezone)
        <hito-timezone-alert value="{{ auth()->user()->timezone->offset }}" url="{{ route('account.edit-profile') }}"></hito-timezone-alert>
    @endif

    <div class="flex flex-col w-screen min-h-screen">
        <div>
            @include('hito::_shared.header-menu', ['placeholder' => true])
            @include('hito::_shared.header-menu')
        </div>

        <div class="flex-1 flex">
            <div>
                <hito-sidenav>
                    @if(!empty($menus))
                        <div class="menu flex-1 overflow-auto" data-scrollbar>
                            @foreach($menus as $menu)
                                <div class="menu__item">
                                    @if(empty($menu->route))
                                        <div class="menu__title"><span>{{ $menu->name }}</span>
                                        </div>
                                    @else
                                        <a href="{{ route($menu->route) }}" class="menu__button">
                                            <i class="{{ $menu->icon }} text-xl"></i> <span>{{ $menu->name }}</span>
                                        </a>
                                        <turbo-frame id="sidenav-content" target="_top">
                                            @endif

                                            @if(!empty($menu->items))
                                                <div class="menu__children">
                                                    @foreach($menu->items as $item)
                                                        <a href="{{ route($item->route) }}" class="menu__link @if($item->isActive) menu__link--active @endif">
                                                            <span class="w-[35px] text-center"><i class="{{ $item->icon }} text-xl"></i></span>
                                                            <span>{{ $item->name }}</span></a>
                                                    @endforeach
                                                </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div>
                        @if(!Route::is('admin.*'))
                            <div class="p-4 flex items-center justify-center">
                                @include('hito::_shared.location-selector')
                            </div>


                            @if(auth()->user()->can('access-admin-panel') && \Route::has('admin.dashboard'))
                                <div class="p-4 flex items-center justify-center">
                                    <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 bg-gray-100 hover:bg-gray-200 block w-full select-none
                        transition duration-200 rounded-lg hover:shadow-lg border border-gray-200 hover:border-gray-300 text-center space-x-2">
                                        <i class="fas fa-cogs"></i>
                                        <span class="uppercase font-bold text-sm tracking-wide">Admininistration</span>
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                </hito-sidenav>
            </div>

            <div class="flex-1">
                <div class="flex flex-col min-h-full max-w-[800px] min-w-[200px] w-full mx-auto gap-2 py-4 flex-1">
                    <main class="flex-1 mx-4 space-y-4">
                        @if(View::hasSection('title') || View::hasSection('subtitle') || View::hasSection('actions'))
                            <div class="flex flex-col items-start sm:flex-row sm:items-center justify-between gap-2 w-full">
                                <div>
                                    @hasSection('title')
                                        <h1 class="text-4xl">@yield('title')</h1>
                                    @endif
                                    @hasSection('subtitle')
                                        <p>@yield('subtitle')</p>
                                    @endif
                                </div>
                                <div class="flex sm:justify-end gap-1 flex-wrap">
                                    @yield('actions')
                                </div>
                            </div>
                        @endif

                        @yield('content')
                    </main>

                    @include('hito::_shared.footer')
                </div>
            </div>

            <div>
                <!--    <turbo-frame data-turbo-permanent id="chatnav">
        <hito-chatnav>
            @include('hito::_shared.chat-sidebar')
                </hito-chatnav>
            </turbo-frame>-->
            </div>
        </div>
    </div>
@overwrite
