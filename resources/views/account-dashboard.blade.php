@extends('hito::_layouts.app')

@section('title', 'My account')

@section('content')
    <div class=" rounded shadow bg-white py-8 px-8">
        <div class="space-y-6">
            @foreach($menus as $menu)
                <div class="py-2">
                    <div class="font-bold text-gray-400 tracking-widest">{{ $menu->name }}</div>
                    <div class="account_list">
                        @foreach($menu->items as $item)
                            <div class="account_list__item">
                                <a href="{{ route($item->route, $item->routeParams) }}" class="account_list__link">
                                    <span class="account_list__icon"><i class="{{ $item->icon }}"></i></span>
                                    <h2 class="account_list__title">{{ $item->name }}</h2>
                                    <i class="fas fa-chevron-right account_list__arrow"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
