@extends('hito::_layouts.app')

@section('title', 'My notifications')

@section('content')
    <div class="my-4 space-y-4">
        <turbo-frame id="notifications" target="_top">
        <div>
            @foreach($notifications as $notification)
                @include('hito::notifications._notification')
            @endforeach
        </div>
        </turbo-frame>
    </div>

    <div>
        {{ $notifications->links() }}
    </div>
@endsection
