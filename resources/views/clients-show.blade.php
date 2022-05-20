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

@section('header-banner', $client->banner)
@section('header-avatar', $client->avatar)

@section('header-content')

<div class="show-layout__title">
    <h1 class="show-layout__title_name">{{ $client->name }}</h1>
</div>

<div class="show-layout__wrapper">
    <div class="show-layout__wrapper_info">
        @if (null !== $client->address)
            <span class="truncate block md:max-w-[90%] space-x-1"> 
                <i class="fas fa-map-marker-alt"></i> 
                <span>{{ $client->address}}</span>
            </span>
        @endif
    </div>
    <div class="uppercase text-sm text-gray-300 hidden md:block">
         @if (null !== $country?->name)
            <span class="space-x-1"> 
                <i class="fas fa-globe"></i> 
                <span>{{ $country?->name}}</span>
            </span>
         @endif
    </div>
</div>

<div class="show-layout__left_mobile">
    <div class="uppercase text-sm text-gray-300 md:hidden">
        @if (null !== $country?->name)
        <span class="space-x-1"> 
            <i class="fas fa-globe"></i> 
            <span>{{ $country?->name}}</span>
        </span>
     @endif
    </div>
</div>
@endsection

@section('header-additional-info')
<div class="show-layout__left_container">
    <div class="show-layout__left_items">
    </div>
</div>

<div class="show-layout__right">
    @can('viewAny', \App\Models\Project::class)
    <x-hito::card.item-list>
        @if($client->projects->isEmpty())
             <p class="text-md font-normal text-gray-600">Projects were not provided</p>
        @else
             @foreach ($client->projects as $project)
             <x-hito::card.item-list-single title="{{ $project->name }}" :url="route('projects.show', $project->id)"
                 :image="$project->avatar">
             </x-hito::card.item-list-single>
             @endforeach
        @endif
    </x-hito::card.item-list>
    @endcan
</div>
@endsection

@section('content')

@endsection