@extends('hito::_layouts.app')

@section('title', 'Procedures')

@section('content')

    <turbo-echo-stream-source channel="procedures"></turbo-echo-stream-source>
    <div class="my-4 space-y-4">
        @if(session('success'))
            <div class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
        @endif

        <turbo-frame id="procedures" target="_top">
        @foreach($procedures as $procedure)
            <div class="mb-4">
                @include('procedures._procedure')
            </div>
        @endforeach
        </turbo-frame>
    </div>

    <div>
        {{ $procedures->links() }}
    </div>
@endsection
