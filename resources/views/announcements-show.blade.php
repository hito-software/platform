@extends('hito::_layouts.app')

@section('title', $announcement->name)

@section('content')
    <div class="rounded shadow bg-white p-4 space-y-4">
        <div class="flex justify-between items-center">
            <div class="flex flex-col -space-y-2">
                <div>
                    <a href="{{ route('announcements.show', $announcement->id) }}">{{ $announcement->created_at }}</a>
                </div>
                <div>
                    <a href="{{ route('announcements.show', $announcement->id) }}"
                       class="text-gray-500 font-bold text-xs uppercase tracking-wide"
                       title="{{ $announcement->created_at }}">{{ $announcement->created_at->diffForHumans() }}</a>
                </div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="border rounded-lg p-4 bg-gray-100"><p>{{ $announcement->description }}</p></div>

            <div>
                {!! $announcement->content !!}
            </div>
        </div>
    </div>
@endsection
