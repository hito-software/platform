<label
    @if (!empty($for)) for="{{ $for }}" @endif
    class="hito-component__form-label">
    <span>{{ $slot }}</span>
    @if (!empty($required) && $required === true)
        <span class="hito-component__form-label__required">{{ __('app.required') }}</span>
    @endif
</label>
