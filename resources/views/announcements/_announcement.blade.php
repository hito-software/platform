<turbo-frame id="@domid($announcement)" target="_top">
    <div class="rounded shadow bg-white p-4 space-y-4">
        <div class="flex justify-between items-center">
            <div class="flex flex-col -space-y-2">
                <div>
                    <a href="{{ route('announcements.show', $announcement->id) }}">{{ $announcement->name }}</a>
                </div>
                <div>
                    <a href="{{ route('announcements.show', $announcement->id) }}" data-tooltip
                       class="text-gray-500 font-bold text-xs uppercase tracking-wide"
                       title="{{ $announcement->published_at }}">{{ $announcement->published_at->diffForHumans() }}</a>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                @can('view', $announcement)
                    <a href="{{ route('announcements.show', $announcement->id) }}" title="Show" data-tooltip
                       class="py-1 px-2 rounded text-sm font-bold uppercase bg-green-600 text-white hover:bg-green-500">
                        <i class="fas fa-eye"></i></a>
                @endcan
            </div>
        </div>
        <div class="space-y-4">
            <div class="border rounded-lg p-4 bg-gray-100"><p>{{ $announcement->description }}</p></div>

            <div class="flex justify-end">
                @if($announcement->is_pinned)
                    <div class="flex-none">
                        <span class="py-1 px-2 text-sm font-bold uppercase"><i class="fas fa-thumbtack"></i> Pinned</span>
                    </div>
                @endif

                @if(!$announcement->is_published)
                    <div class="flex-none">
                        <span class="py-1 px-2 text-sm font-bold uppercase"><i class="fas fa-clock"></i> Scheduled</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</turbo-frame>
