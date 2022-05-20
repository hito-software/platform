@extends('hito::_layouts.app')
@section('content')
@can('view', $announcement)
    @if(!is_null($announcement))

    <a href="{{ route('announcements.show', $announcement->id) }}" class="block shadow rounded-lg p-10 bg-red-500 hover:bg-red-400 flex space-x-4 items-center mx-2">
        <span class="block text-center text-5xl text-white">
            <i class="fas fa-bullhorn"></i>
        </span>
        <span class="block text-white">
            <span class="block text-2xl m-0 font-bold">{{ $announcement->name }}</span>
            <span class="block">{{ $announcement->description }}</span>
            <span class="block text-sm mt-4"><i class="fas fa-clock"></i> {{ $announcement->published_at->diffForHumans() }}</span>
        </span>
    </a>
    @endif
    @endcan

    <div class="grid grid-cols-1 sm:grid-cols-12 w-full gap-4 px-2">
        <div class="space-y-4 sm:hidden">
            @include('hito::_shared.widgets')
        </div>
        <div class="sm:col-span-8 space-y-2 mb-2">
            <div class="w-full rounded shadow bg-white flex justify-between items-center">
                <div>
                    @if($statusList->count())
                        <button class="uppercase text-sm font-bold p-2 tracking-wide"><i
                                class="fas fa-check-double"></i> Mark all as read
                        </button>
                    @endif
                </div>
                <div>
                    <button class="p-2"><i class="fas fa-filter"></i></button>
                </div>
            </div>

            @forelse($statusList as $user)
                <div class=" status_list rounded shadow bg-white p-4 space-y-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div>
                                <a href="{{ route('users.show', $user->id) }}">
                                    <x-hito::UserAvatar size="2rem" :user="$user"/>
                                </a>
                            </div>
                            <div class="flex flex-col -space-y-2">
                                <div>
                                    <a href="{{ route('users.show', $user->id) }}"
                                       class="status_list__user text-sm" title="{{ $user->full_name }}">{{ $user->full_name }}</a>
                                </div>
                                <div>
                                    <a href="{{ route('users.show', $user->id) }}"
                                       class="text-gray-500 font-bold text-xs uppercase tracking-wide"
                                       title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="hover:bg-gray-100 px-2 rounded-lg text-gray-500"><i
                                    class="fas fa-ellipsis-h"></i></button>
                        </div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at in, iure optio perferendis
                            sapiente.</p>
                    </div>
                </div>
            @empty
                <div class="bg-white p-4 text-center shadow space-y-4">
                    <img src="{{ url('images/undraw_empty_street_sfxm.svg') }}" alt=""/>
                    <p>
                        @switch(random_int(1,3))
                            @case(1)
                            Looks like this place is empty...
                            @break
                            @case(2)
                            Nothing to see here...
                            @break
                            @case(3)
                            Move along...
                            @break
                        @endswitch
                    </p>
                </div>
            @endforelse
        </div>
        <div class="sm:col-span-4 space-y-4 hidden sm:block">
            @include('hito::_shared.widgets')
        </div>
    </div>
@endsection
