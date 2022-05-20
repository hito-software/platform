@props(['action' => '', 'noAction' => '', 'entity' => ''])

@if (!empty($action))
    <form action="{{ $action }}" method="post">
        @csrf
        @method('delete')
@endif
<div class="my-4 rounded-lg bg-red-700 p-10 text-white shadow">
    <div class="flex items-center justify-center space-x-5">
        <div class="text-center text-5xl"><i class="fas fa-times"></i></div>
        <div>
            <h3 class="text-center text-3xl font-bold">{{ $title }}</h3>
            <p class="text-center">{!! $description !!}</p>
        </div>
        <div class="text-center text-5xl"><i class="fas fa-times"></i></div>
    </div>
    <div>
        {{ $slot }}
    </div>
    <div class="mt-5 flex justify-center space-x-4">
        @if (!empty($action))
            <div>
                <button type="submit"
                    class="rounded bg-black bg-opacity-40 py-2 px-4 font-bold uppercase hover:bg-opacity-60">{{ $actionButton ?? __('app.yes') }}</button>
            </div>
        @endif
        <div>
            <a href="{{ $noAction }}"
                class="block rounded bg-black bg-opacity-25 py-2 px-4 font-bold hover:bg-opacity-60">{{ $noActionButton ?? __('app.no') }}</a>
        </div>
    </div>
</div>

@if (!empty($action))
    </form>
@endif
