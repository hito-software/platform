@extends('hito::_layouts.app')

@section('title', 'Edit profile')

@section('content')

@if (session()->has('success'))
<div class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
@endif

<form method="post" action="{{route('account.update-profile')}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="space-y-4 my-4 bg-white p-4 rounded-lg shadow">
        <div class="space-y-4 my-4">
            <x-hito::Form.Input title="Name" name="name" :required="true" value="{{ $user->name }}" />
            <x-hito::Form.Input title="Surname" name="surname" :required="true" value="{{ $user->surname }}" />
            <x-hito::Form.Input title="Email Address" name="email" :required="true" value="{{ $user->email }}" />
            <x-hito::Form.Select.Location name="location" :value="$user->location_id" :required="true" />
            <x-hito::Form.Select.Timezone name="timezone" :value="$user->timezone_id" :required="true" />
            <x-hito::Form.Input title="Skype" name="skype" value="{{ $user->skype }}" />
            <x-hito::Form.Input title="Whatsapp" name="whatsapp" value="{{ $user->whatsapp }}" />
            <x-hito::Form.Input title="Telegram" name="telegram" value="{{ $user->telegram }}" />
            <x-hito::Form.Input title="Phone number" name="phone" value="{{ $user->phone }}" />
            <div>
                <button type="submit"
                    class="bg-blue-500 py-2 px-4 rounded uppercase font-bold text-white text-sm hover:bg-opacity-75">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection
