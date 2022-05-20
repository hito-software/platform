@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $teams->total() }}</span>
                    <span>Teams</span>
                </span>
            </div>
        </div>

        <div>
            <span class="filter_bar__filter"><i class="fas fa-filter"></i></span>
        </div>
    </div>

    @if (session('success'))
        <div class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
    @endif

    <div class="hito-component__card__list">
        @foreach ($teams as $team)
            <x-hito::Card :banner="$team->banner" :title="$team->name" subtitle="{{ $team->users?->count() }} members">

                <x-slot name="imageSlot">
                    <x-hito::UserAvatar size="6rem" :title="$team->name" border="lg"/>
                </x-slot>

                @can('viewAny', \App\Models\User::class)
                    <x-hito::card.item-list>
                        @foreach ($team->users as $user)
                            <x-hito::card.item-list-single title="{{ $user->full_name }}" :url="route('users.show', $user->id)"
                                :image="$user->avatar">
                            </x-hito::card.item-list-single>
                        @endforeach
                    </x-hito::card.item-list>
                @endcan

                <x-slot name="footerSlot">
                    @can('view', $team)
                        <a href="{{ route('teams.show', $team->id) }}" class="hito-component__card__button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endcan
                </x-slot>
            </x-hito::Card>
        @endforeach
    </div>

    @if ($teams->hasPages())
        <div class="w-full shadow-lg p-5 my-6 bg-white rounded">
            {{ $teams->links() }}
        </div>
    @endif
@endsection
