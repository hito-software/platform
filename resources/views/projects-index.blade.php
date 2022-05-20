@extends('hito::_layouts.app')

@section('content')

    <div class="filter_bar">
        <div class="flex-1 select-none">
            <div>
                <span class="filter_bar__title">
                    <span class="filter_bar__count">{{ $projects->total() }}</span>
                    <span>Projects</span>
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
        @foreach ($projects as $project)
            <x-hito::Card :banner="$project->banner" :title="$project->name" :subtitle="$project->description" :description="$project->address">

                <x-slot name="imageSlot">
                    <x-hito::UserAvatar size="6rem" :title="$project->name" border="lg" />
                </x-slot>

                @can('viewAny', \App\Models\Team::class)
                <x-hito::card.item-list>
                    @foreach($project->teams as $team)
                        <x-hito::card.item-list-single :title="$team->name" :url="route('teams.show', $team->id)"></x-hito::card.item-list-single>
                    @endforeach
                </x-hito::card.item-list>
                @endcan

                <x-slot name="footerSlot">
                    @can('view', $project)
                        <a href="{{ route('projects.show', $project->id) }}" class="hito-component__card__button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endcan
                </x-slot>
            </x-hito::Card>
        @endforeach
    </div>

    @if ($projects->hasPages())
        <div class="w-full shadow-lg p-5 my-6 bg-white rounded">
            {{ $projects->links() }}
        </div>
    @endif
@endsection
