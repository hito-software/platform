@if ($type === \App\Enums\FileType::IMAGE)
    <span class="relative block" style="width: inherit; height: inherit;">
        @if ($media->aggregate_type === \Plank\Mediable\Media::TYPE_VIDEO && $type === \App\Enums\FileType::IMAGE)
            <span
                class="pointer-events-none absolute top-0 left-0 z-10 flex h-full w-full items-center justify-center">
                <span
                    class="flex h-16 w-16 items-center justify-center rounded-lg bg-black/50 text-4xl text-white">
                    <i class="fa-solid fa-play"></i>
                </span>
            </span>
        @endif

        @if (is_null($variants))
            <img src="{{ $url }}"
                alt="{{ $alt ?? $media->filename }}"
                @if (!empty($title)) title="{{ $title }}" @endif
                @if ($lazyLoading) loading="lazy" @endif
                {{ $attributes }} />
        @else
            <picture>
                @foreach ($variants as $variant)
                    <source media="{{ $variant['query'] }}"
                        srcset="{{ $variant['url'] }}"
                        type="{{ $variant['mimeType'] }}">
                @endforeach
                <img src="{{ $url }}"
                    alt="{{ $alt ?? $media->filename }}"
                    @if (!empty($title)) title="{{ $title }}" @endif
                    @if ($lazyLoading) loading="lazy" @endif
                    {{ $attributes }} />
            </picture>
        @endif
    </span>
@elseif($type === \App\Enums\FileType::VIDEO)
    <video {{ $attributes }}>
        <source src="{{ $url }}" type="{{ $media->mime_type }}">
    </video>
@endif
