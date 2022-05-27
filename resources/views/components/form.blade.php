@props(['action' => '', 'method' => 'get', 'id' => ''])

<div class="space-y-4">
    <form action="{{ $action }}" method="{{ $formMethod }}"
        id="{{ $id }}" novalidate>
        @csrf
        @method($requestMethod)

        <div class="space-y-4">
            @if (session('failed'))
                <x-hito::alert type="danger">{!! session('failed') !!}</x-hito::alert>
            @endif

            @if (session('success'))
                <x-hito::alert type="success">{!! session('success') !!}</x-hito::alert>
            @endif

            <div class="space-y-4">
                {{ $slot }}
            </div>
        </div>
    </form>
</div>
