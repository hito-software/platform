@extends('hito::_layouts.app')

@section('title', 'Update Password')

@section('content')

    @if (session()->has('success'))
        <div
            class="py-4 px-6 bg-green-600 text-white rounded font-bold mb-5">{{ session('success') }}</div>
    @endif
        <form method="post" action="{{route('account.update-password')}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="space-y-4 my-4 bg-white p-4 rounded-lg shadow">
                <div class="space-y-4 my-4">
                    <div>
                        <label for="form_password" class="block">New Password</label>
                        <input type="password" name="password" id="form_password"
                            class="border py-2 px-4 rounded w-full"
                            value=""/>
                        @error('password') <p class="text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="form_password_confirmation" class="block">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="form_password_confirmation"
                            class="border py-2 px-4 rounded w-full"
                            value=""/>
                        @error('password_confirmation') <p class="text-red-600">{{ $message }}</p> @enderror
                    </div>

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
