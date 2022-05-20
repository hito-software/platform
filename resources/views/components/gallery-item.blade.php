@if (in_array($item->aggregate_type, ['image', 'vector', 'video']))
    <a href="{{ $item?->getUrl() }}"
        class="glightbox relative block aspect-square h-full w-full select-none transition duration-150 hover:opacity-[0.7]"
        data-gallery="gallery_{{ $id }}">
        <x-ShowMedia :media="$item"
            :type="App\Enums\FileType::IMAGE"
            :variant="App\Enums\MediaVariant::S"
            class="h-full w-full rounded-md object-cover" />
    </a>
@endif
