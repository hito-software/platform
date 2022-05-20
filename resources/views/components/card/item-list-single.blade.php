@props(['image' => null, 'url' => null, 'title' => null])

<a href="{{ $url }}" class="hito-component__card__body_item"
    title="{{ $title }}" data-tooltip>

    <x-hito:Avatar size="3rem" :title="$title" :image="$image" border="md" />
</a>
