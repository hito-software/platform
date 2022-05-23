@extends('hito::_layouts.app')

@section('title', 'Announcements')

@section('content')
    <turbo-echo-stream-source channel="announcements"></turbo-echo-stream-source>
    <div class="my-4 space-y-4">
        @if(session('success'))
            <div class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
        @endif

        <turbo-frame id="announcements" target="_top">
        @foreach($pinned as $announcement)
            <div class="mb-4">
                @include('hito::announcements._announcement')
            </div>
        @endforeach

        @foreach($announcements as $announcement)
            <div class="mb-4">
                @include('hito::announcements._announcement')
            </div>
        @endforeach
        </turbo-frame>
    </div>

    <div>
        {{ $announcements->links() }}
    </div>
@endsection
