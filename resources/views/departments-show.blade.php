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

@section('header-banner', $department->banner)
@section('header-avatar', $department->avatar)

@section('header-content')
<div class="show-layout__title">
    <h1 class="show-layout__title_name">{{ $department->name }}</h1>
</div>

<div class="show-layout__wrapper">
    <div class="show-layout__wrapper_info">
        @if (null !== $department->description)
        <span class="truncate block md:max-w-[90%] space-x-1">
            <span>{{ $department->description }}</span>
        </span>
        @endif
    </div>
</div>

<div class="show-layout__left_mobile">
    <div class="show-layout__left_items">
        @can('viewAny', \App\Models\User::class)
        <x-hito::card.item-list>
            @foreach ($department->users as $user)
            <x-hito::card.item-list-single title="{{ $user->full_name }}" :url="route('users.show', $user->id)"
                :image="$user->avatar">
            </x-hito::card.item-list-single>
            @endforeach
        </x-hito::card.item-list>
        @endcan
    </div>
</div>
@endsection

@section('header-additional-info')
<div class="show-layout__left_container">
    <div class="show-layout__left_items">
        @can('viewAny', \App\Models\User::class)
        <x-hito::card.item-list>
            @if($department->users->isEmpty())
                 <p class="text-md font-normal text-gray-600">Members were not provided</p>
            @else
                 @foreach ($department->users as $user)
                 <x-hito::card.item-list-single title="{{ $user->full_name }}" :url="route('users.show', $user->id)"
                     :image="$user->avatar">
                 </x-hito::card.item-list-single>
                 @endforeach
            @endif
        </x-hito::card.item-list>
        @endcan
    </div>
</div>

@endsection

@section('content')

@endsection
