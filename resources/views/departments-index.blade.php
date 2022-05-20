@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $departments->total() }}</span>
                    <span>Departments</span>
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
        @foreach ($departments as $department)
            <x-hito::Card :banner="$department->banner" :title="$department->name" :subtitle="$department->description">

                <x-slot name="imageSlot">
                    <x-hito::UserAvatar size="6rem" :title="$department->name" border="lg" />
                </x-slot>

                @can('viewAny', \App\Models\User::class)
                    <x-hito::card.item-list>
                        @foreach ($department->users as $user)
                            <x-hito::card.item-list-single title="{{ $user->full_name }}" :url="route('users.show', $user->id)"
                                :image="$user->avatar">
                            </x-hito::card.item-list-single>
                        @endforeach
                    </x-hito::card.item-list>
                @endcan

                <x-slot name="footerSlot">
                    @can('view', $department)
                        <a href="{{ route('departments.show', $department->id) }}" class="hito-component__card__button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endcan
                </x-slot>
            </x-hito::Card>
        @endforeach
    </div>

    @if ($departments->hasPages())
        <div class="w-full shadow-lg p-5 my-6 bg-white rounded">
            {{ $departments->links() }}
        </div>
    @endif

@endsection
