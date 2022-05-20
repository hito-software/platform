@extends('hito::_layouts.show-resource', [
    'menu' => [
        [
            'icon' => 'fas fa-globe-europe',
            'url' => '#',
            'name' => 'Overview'
],
[
            'icon' => 'fas fa-info-circle',
            'url' => '#',
            'name' => 'About'
],
[
            'icon' => 'fas fa-list',
            'url' => '#',
            'name' => 'Activity'
],
[
            'icon' => 'far fa-sticky-note',
            'url' => '#',
            'name' => 'Posts'
],
[
            'icon' => 'far fa-comment-alt',
            'url' => '#',
            'name' => 'Comments'
]
]
])

@section('header-banner', $user->banner)
@section('header-avatar', $user->avatar)

@section('header-content')
<div class="show-layout__title">
    <h1 class="show-layout__title_name">{{ $user->full_name }}</h1>
    <span class="rounded-full inline-block w-[1rem] h-[1rem] select-none bg-green-400 min-h-[1rem] min-w-[1rem]"></span>
</div>
<div class="show-layout__wrapper">
    <div class="show-layout__wrapper_info">
        @if (null !== $user->location)
            <span class="truncate block md:max-w-[90%] space-x-1">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $user->location['address'] }}</span>
            </span>
        @endif
    </div>
    <div class="uppercase text-sm text-gray-300 hidden md:block">
        <span>Last online status 5 days ago</span>
    </div>
</div>

<div class="show-layout__left_mobile">
    <div class="show-layout__left_items">
        @if (isset($user->skype))
            <a href="skype:{{ $user->skype }}?chat" title="Skype" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#00aff0]">
                <i class="fab fa-skype"></i>
            </a>
        @endif

        @if (isset($user->whatsapp))
            <a class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#25D366]"
               href="https://api.whatsapp.com/send?phone={{ $user->whatsapp }}" title="WhatsApp"
               data-tooltip>
                <i class="fab fa-whatsapp"></i>
            </a>
        @endif

        @if (isset($user->telegram))
            <a href="https://telegram.me/{{ $user->telegram }}" title="Telegram" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#2AABEE]">
                <i class="fab fa-telegram-plane"></i>
            </a>
        @endif

            @if (isset($user->email))
            <a href="mailto:{{ $user->email }}" title="Mail" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white  bg-[#EA4335]">
                <i class="far fa-envelope"></i>
            </a>
        @endif

        @if (isset($user->phone))
            <a href="tel:+12215555555" title="Phone" data-tooltip class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-blue-700">
                <i class="fas fa-mobile-alt"></i>
            </a>
        @endif
    </div>

    <div class="uppercase text-sm text-gray-300 md:hidden">
        <span>Last online status 5 days ago</span>
    </div>
</div>
@endsection

@section('header-additional-info')
<div class="show-layout__left_container">
    <div class="show-layout__left_items">
        @if (isset($user->skype))
            <a href="skype:{{ $user->skype }}?chat" title="Skype" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#00aff0]">
                <i class="fab fa-skype"></i>
            </a>
        @endif

        @if (isset($user->whatsapp))
            <a class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#25D366]"
               href="https://api.whatsapp.com/send?phone={{ $user->whatsapp }}" title="WhatsApp"
               data-tooltip>
                <i class="fab fa-whatsapp"></i>
            </a>
        @endif

        @if (isset($user->telegram))
            <a href="https://telegram.me/{{ $user->telegram }}" title="Telegram" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#2AABEE]">
                <i class="fab fa-telegram-plane"></i>
            </a>
        @endif

        @if (isset($user->email))
            <a href="mailto:{{ $user->email }}" title="Mail" data-tooltip
               class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-[#EA4335]">
                <i class="far fa-envelope"></i>
            </a>
        @endif

        @if (isset($user->phone))
            <a href="tel:+12215555555" title="Phone" data-tooltip class="rounded overflow-hidden w-[2rem] h-[2rem] flex justify-center items-center text-white bg-blue-700">
                <i class="fas fa-mobile-alt"></i>
            </a>
        @endif
    </div>
</div>

<div class="show-layout__right">
    <div class="flex flex-col items-center justify-center">
        <span class="font-bold text-gray-500 text-lg">21</span>
        <span class="font-bold text-gray-500 text-sm">POSTS</span>
    </div>

    <div class="flex flex-col items-center justify-center">
        <span class="font-bold text-gray-500 text-lg">3</span>
        <span class="font-bold text-gray-500 text-sm">COMMENTS</span>
    </div>

    <div class="flex flex-col items-center justify-center">
        <span class="font-bold text-gray-500 text-lg">81.6K</span>
        <span class="font-bold text-gray-500 text-sm">VIEWS</span>
    </div>
</div>
@endsection

@section('content')

@endsection
