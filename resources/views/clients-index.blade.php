@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $clients->total() }}</span>
                    <span>Clients</span>
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
        @foreach ($clients as $client)
            <x-hito::Card :banner="$client->banner" :title="$client->name" :subtitle="$client->address" :description="$client->country->name">

                <x-slot name="imageSlot">
                    <x-hito::UserAvatar size="6rem" :title="$client->name" border="lg"/>
                </x-slot>

                <x-hito::card.item-list>
                    @can('viewAny', \App\Models\Project::class)
                        @foreach ($client->projects as $project)
                            <x-hito::card.item-list-single title="{{ $project->name }}" :url="route('projects.show', $project->id)"
                                :image="$project->avatar">
                            </x-hito::card.item-list-single>
                        @endforeach
                    @endcan
                </x-hito::card.item-list>

                <x-slot name="footerSlot">
                    @can('view', $client)
                        <a href="{{ route('clients.show', $client->id) }}" class="hito-component__card__button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endcan
                </x-slot>
            </x-hito::Card>
        @endforeach
    </div>

    @if ($clients->hasPages())
        <div class="w-full shadow-lg p-5 my-6 bg-white rounded">
            {{ $clients->links() }}
        </div>
    @endif
@endsection
