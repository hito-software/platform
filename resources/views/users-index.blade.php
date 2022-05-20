@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $users->total() }}</span>
                    <span>Registered users</span>
                </span>
            </div>
        </div>

        <div>
            <span class="filter_bar__filter"><i class="fas fa-filter"></i></span>
        </div>
    </div>

        @if(session('success'))
            <div class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
        @endif

        <div class="hito-component__card__list">
            @foreach($users as $user)
                <x-hito::Card :banner="$user->banner" title="{{ $user->full_name }}" :subtitle="$user->email">

                        <x-slot name="bannerSlot">
                            @if($user->has_birthday_today)
                                <div class="absolute top-5 right-5 z-10 text-white text-lg" title="It's {{ $user->name }}'s birthday!" data-tooltip>
                                    <i class="fas fa-birthday-cake"></i>
                                </div>
                            @endif
                        </x-slot>

                        <x-slot name="imageSlot">
                            <x-hito::UserAvatar size="6rem" :user="$user" border="lg"/>
                        </x-slot>

                        @can('viewAny', \App\Models\Team::class)
                            <x-hito::card.item-list>
                                @foreach($user->teams as $team)
                                    <x-hito::card.item-list-single :title="$team->name" :url="route('teams.show', $team->id)"></x-hito::card.item-list-single>
                                @endforeach
                            </x-hito::card.item-list>
                        @endcan

                        <x-slot name="footerSlot">
                            <x-slot name="footerItemsSlot">
                                @if(isset($user->email))
                                    <a href="mailto:{{ $user->email }}" title="Mail" data-tooltip class="footer__item">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                @endif

                                @if(isset($user->skype))
                                    <a href="skype:{{ $user->skype }}?chat" title="Skype" data-tooltip class="footer__item">
                                        <i class="fab fa-skype"></i>
                                    </a>
                                @endif

                                @if(isset($user->whatsapp))
                                    <a class="footer__item" href="https://api.whatsapp.com/send?phone={{ $user->whatsapp }}"
                                        title="WhatsApp" data-tooltip>
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                @endif

                                @if(isset($user->telegram))
                                    <a href="https://telegram.me/{{ $user->telegram }}" title="Telegram" data-tooltip
                                        class="footer__item">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                @endif

                                @if(isset($user->phone))
                                    <a href="tel:{{ $user->phone }}" title="Phone" data-tooltip class="footer__item">
                                        <i class="fas fa-mobile-alt"></i>
                                    </a>
                                @endif
                            </x-slot>

                            @can('view', $user)
                                <a href="{{ route('users.show', $user->id) }}" class="hito-component__card__button">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @endcan
                        </x-slot>
                </x-hito::Card>
            @endforeach
        </div>

    @if($users->hasPages())
        <div class="w-full shadow-lg p-5 my-6 bg-white rounded">
            {{ $users->links() }}
        </div>
    @endif

@endsection
