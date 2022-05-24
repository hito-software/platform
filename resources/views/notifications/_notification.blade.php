<div class="space-y-2 my-4 bg-white p-4 rounded-lg shadow">
    <div class="border-b px-5 py-2 flex items-center justify-between">
        <div>
            <div class="uppercase tracking-wide font-bold">{{ $notification->view?->title }}</div>
            <div class="flex">
                <div title="{{ $notification->created_at->format('Y-m-d H:i:s') }}"
                     data-tooltip>{{ $notification->created_at->diffForHumans() }}</div>
            </div>
        </div>
        @if(!empty($notification->view?->actionUrl) && !empty($notification->view?->actionName))
        <div>
            <a href="{{ $notification->view?->actionUrl }}"
               class="bg-blue-500 py-2 px-4 rounded text-white uppercase text-sm font-bold tracking-wide
               hover:bg-opacity-90">{{ $notification->view?->actionName }}</a>
        </div>
        @endif
    </div>
    <div class="px-5 py-2">
        {!! $notification->view?->content !!}
    </div>
</div>
