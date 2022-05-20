@extends('hito::_layouts.app')

@section('title', $location->name)

@section('content')
    <div class="space-y-4 my-4 bg-white p-4 rounded-lg shadow">
        <x-hito::Form.Input name="name" title="Name" value="{{ $location->name }}" disabled/>
        <x-hito::Form.Input name="description" title="Description" value="{{ $location->description }}" disabled/>
        <x-hito::Form.Input name="country" title="Country" value="{{ $location->country?->name }}" disabled/>
        <x-hito::Form.Input name="address" title="Address" value="{{ $location->address }}" disabled/>
    </div>
@endsection
