@props(['items' => [], 'id' => ''])

<div class="hito-component__gallery__list">
    @foreach ($items as $item)
        <div class="hito-component__gallery__list-item">
            @include('components.gallery-item')
        </div>
    @endforeach
</div>

@push('js')
    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                GLightbox({
                    touchNavigation: true,
                    loop: true,
                    autoplayVideos: true,
                    draggable: false
                });
            });
        })();
    </script>
@endpush
