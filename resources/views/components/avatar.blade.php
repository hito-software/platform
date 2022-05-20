<div class="hito-component__avatar {{ $classList }}"
    style="width: {{ $size }}; height: {{ $size }}; font-size: max(1rem, calc(30 / 100 * {{ $size }}))">

    @if (!empty($image))
        <img src="{{ $image }}" alt="" class="w-full" />
    @elseif(!empty($symbol))
        <span>{{ $symbol }}</span>
    @endif
</div>
