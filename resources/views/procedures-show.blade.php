@extends('hito::_layouts.app')

@section('title', $procedure->name)

@section('content')
    <div class="rounded shadow bg-white p-4 space-y-4">
        <div class="flex justify-between items-center">
            <div class="flex flex-col -space-y-2">
                <div>
                    <a href="{{ route('procedures.show', $procedure->id) }}">{{ $procedure->created_at }}</a>
                </div>
                <div>
                    <a href="{{ route('procedures.show', $procedure->id) }}"
                       class="text-gray-500 font-bold text-xs uppercase tracking-wide"
                       title="{{ $procedure->created_at }}">{{ $procedure->created_at->diffForHumans() }}</a>
                </div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="border rounded-lg p-4 bg-gray-100"><p>{{ $procedure->description }}</p></div>

            <div>
                {!! $procedure->content !!}
            </div>
        </div>
    </div>
@endsection
