<turbo-frame id="@domid($procedure)" target="_top">
    <div class="rounded shadow bg-white p-4 space-y-4">
        <div class="flex justify-between items-center">
            <div class="flex flex-col -space-y-2">
                <div>
                    <a href="{{ route('procedures.show', $procedure->id) }}">{{ $procedure->name }}</a>
                </div>
                <div>
                    <a href="{{ route('procedures.show', $procedure->id) }}" data-tooltip
                       class="text-gray-500 font-bold text-xs uppercase tracking-wide"
                       title="{{ $procedure->created_at }}">{{ $procedure->created_at->diffForHumans() }}</a>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                @can('view', $procedure)
                    <a href="{{ route('procedures.show', $procedure->id) }}" title="Show" data-tooltip
                       class="py-1 px-2 rounded text-sm font-bold uppercase bg-green-600 text-white hover:bg-green-500">
                        <i class="fas fa-eye"></i></a>
                @endcan
            </div>
        </div>
        <div class="space-y-4">
            <div class="border rounded-lg p-4 bg-gray-100"><p>{{ $procedure->description }}</p></div>
        </div>
    </div>
</turbo-frame>
