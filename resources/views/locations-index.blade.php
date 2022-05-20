@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $locations->total() }}</span>
                    <span>Locations</span>
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
        @foreach ($locations as $location)
            <x-hito::Card :banner="$location->country" :title="$location->name" :subtitle="$location->country?->name">

                <x-slot name="imageSlot">
                    <x-hito::Avatar size="6rem" :title="$location->name" border="lg" />
                </x-slot>


                <x-slot name="footerSlot">
                    @can('view', $location)
                        <a href="{{ route('locations.show', $location->id) }}" class="hito-component__card__button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endcan
                </x-slot>
            </x-hito::Card>
        @endforeach
    </div>

@endsection
