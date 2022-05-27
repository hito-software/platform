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

@section('header-banner', $project->banner)
@section('header-avatar', $project->avatar)

@section('header-content')
<div class="show-layout__title">
    <h1 class="show-layout__title_name">{{ $project->name }}</h1>
</div>
<div class="show-layout__wrapper">
    <div class="show-layout__wrapper_info">
        @if (null !== $project->address)
            <span class="truncate block md:max-w-[90%] space-x-1">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $project->address}}</span>
            </span>
        @endif
    </div>
    <div class="uppercase text-sm text-gray-300 hidden md:block">
        @if(!empty($project->country) || !empty($project->client->country))
        <span class="space-x-1">
            <i class="fas fa-globe"></i>
            <span>{{ $project->country?->name ?: $project->client->country?->name }}</span>
        </span>

        @else
          -
        @endif
    </div>

    <div class="show-layout__left_mobile">
        <div class="uppercase text-sm text-gray-300 md:hidden">
            @if(!empty($project->country) || !empty($project->client->country))
            <span class="space-x-1">
                <i class="fas fa-globe"></i>
                <span>{{ $project->country?->name ?: $project->client->country?->name }}</span>
            </span>

            @else
              -
            @endif
        </div>

        <div class="show-layout__left_items">
            @can('viewAny', \App\Models\Team::class)
            <x-hito::card.item-list>
                @foreach ($project->teams as $team)
                <x-hito::card.item-list-single title="{{ $team->name }}" :url="route('teams.show', $team->id)"
                    :image="$team->avatar">
                </x-hito::card.item-list-single>
                @endforeach
            </x-hito::card.item-list>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('header-additional-info')
<div class="show-layout__left_container">
    <div class="show-layout__left_items">
        @can('viewAny', \App\Models\Team::class)
        <x-hito::card.item-list>
            @foreach ($project->teams as $team)
            <x-hito::card.item-list-single title="{{ $team->name }}" :url="route('teams.show', $team->id)"
                :image="$team->avatar">
            </x-hito::card.item-list-single>
            @endforeach
        </x-hito::card.item-list>
        @endcan
    </div>
</div>

@if(!empty($client))
<div class="show-layout__right">
    @can('viewAny', \App\Models\Client::class)
    <x-hito::card.item-list>
        <x-hito::card.item-list-single title="{{ $client->name }}" :url="route('clients.show', $client->id)"
            :image="$client->avatar">
        </x-hito::card.item-list-single>
    </x-hito::card.item-list>
    @endcan
</div>
@endif
@endsection

@section('content')
<div>
    <label for="form_description" class="block">Description</label>
    @if(is_null($project->description ))
         <x-hito::alert type="warn">Description was not provided</x-hito::alert>
    @else
         <textarea name="description" id="form_description" cols="30" rows="2" class="border py-2 px-4 rounded w-full" disabled>{{ $project->description }}</textarea>
    @endif
</div>

<div>
    @if($members->count())
    <div>
        <label class="block">Members</label>
        <div class="space-y-4 mt-2">
            @foreach($roles->sortByDesc('required') as $role)
                <div class="border p-4">
                    <label for="form_roles-{{ $role->id }}" class="block">{{ $role->name }}</label>
                    <select multiple name="roles_{{ $role->id }}[]" id="form_roles-{{ $role->id }}" data-role
                            class="border py-2 px-4 rounded w-full" disabled>
                        @foreach($members as $member)
                            @if($member->role_id === $role->id)
                                <option value="{{ $member->user->id }}" selected>{{ $member->user->name }} {{ $member->user->surname }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
