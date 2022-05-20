<div class="hito-component__card {{ $attributes->get('class') }}">
    @if (!empty($bannerSlot) || !empty($banner))
        <div class="hito-component__card__banner">
            @if (isset($bannerSlot))
                {{ $bannerSlot }}
            @endif

            @if (!empty($banner))
                <img src="{{ $banner }}" alt=""
                    class="h-full w-full object-cover" />
            @endif
        </div>
    @endif

    @if (!empty($imageSlot))
        <div>
            <div class="-mt-16">
                {{ $imageSlot }}
            </div>
        </div>
    @endif

    @if (!empty($title) || !empty($subtitle))
        <div class="px-4 py-2 text-center">
            @if (!empty($title))
                <h2 class="hito-component__card__title">{{ $title }}</h2>
            @endif

            @if (!empty($subtitle))
                <span class="hito-component__card__subtitle">{{ $subtitle }}</span>
            @endif
        </div>
    @endif

    @if (!empty($slot))
        <div class="hito-component__card__body_container">
            {{ $slot }}
        </div>
    @endif

    @if (!empty($footerSlot))
        <div class="hito-component__card__footer">
            <div class="hito-component__card__footer__list">
                @if (isset($footerItemsSlot))
                    {{ $footerItemsSlot }}
                @endif
            </div>

            {{ $footerSlot }}
        </div>
    @endif
</div>
