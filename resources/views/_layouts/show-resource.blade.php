@extends('hito::_layouts.app')

@section('content')
<div class="show-layout__container space-y-4">
    <div class="show-layout__card">
        <div class="show-layout__card_container">
            @hasSection('header-banner')
            <div class="show-layout__banner">
                <img src="@yield('header-banner')" alt="" class="w-full h-full object-cover" />
            </div>
            @endif

            <div class="show-layout__information">
                @hasSection('header-avatar')
                <div class="show-layout__avatar">
                    <img src="@yield('header-avatar')" alt="" class="w-full">
                </div>
                @endif

                <div class="show-layout__description">
                    @yield('header-content')     
                </div>
            </div>
        </div>
        <div class="show-layout__activity">
            @yield('header-additional-info')
        </div>
    </div>

    @if(isset($menu))
    <div class="show-layout__nav">
        @foreach($menu as $menuItem)
        <a href="{{ $menuItem['url'] }}" class="show-layout__nav_item @if(false) show-layout__nav_item--active @endif">
            <i class="{{ $menuItem['icon'] }}"></i>
            <h2 class="show-layout__nav_item_name">{{ $menuItem['name'] }}</h2>
        </a>
        @endforeach
    </div>
    @endif

    <div>@yield('content')</div>
</div>
@overwrite
