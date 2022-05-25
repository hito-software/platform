<x-hito::form.group>
    @if (!empty($title))
        <x-hito::form.label :for="$id" :required="$required">{{ $title }}
        </x-form.label>
    @endif

    @if ($disabled && (empty($value) && $value !== '0'))
        <x-hito::alert>{!! __('hito::components.general.field-value-not-set', ['field' => strtolower($title)]) !!}</x-alert>
    @else
        <div class="hito-component__form-input @error($name) hito-component__form-input--error @enderror">
            @if ($attributes->get('type') === 'textarea')
                <div
                    class="hito-component__form-input__textarea-wrapper @if ($attributes->has('rich')) hito-component__form-input__textarea-wrapper--rich @endif">
                    <textarea name="{{ $name }}" id="{{ $id }}"
                        @if (!empty($placeholder)) placeholder="{{ $placeholder }}" @endif

                        {{ $attributes }}

                        @if ($disabled) disabled @endif>{!! old($name, is_null($value) ? null : $value) !!}</textarea>
                </div>
            @else
                <input
                    type="{{ $disabled ? 'text' : $attributes->get('type', 'text') }}"
                    name="{{ $name }}" id="{{ $id }}"
                    @if (!empty($placeholder)) placeholder="{{ $placeholder }}" @endif

                    {{ $attributes }}

                    @if ($disabled) disabled @endif

                    value="{{ old($name, is_null($value) ? null : $value) }}">
            @endif

            @if ($clear && $attributes->get('type') !== 'textarea' && !$attributes->has('rich'))
                <div class="hito-component__form-input__clear-btn">
                    <button type="button"
                        id="{{ $id }}_clr_button"><i
                            class="fa-solid fa-times"></i></button>
                </div>
            @endif
        </div>

        <div class="flex justify-between">
            <div>
                @if (!empty($note))
                    <x-hito::form.note>{{ $note }}</x-form.note>
                @endif
                <x-hito::form.error :name="$name"></x-form.error>
            </div>
            @if ($attributes->has('maxlength') && !$attributes->has('rich'))
                <div id="{{ $id }}_length_block"
                    class="text-right text-sm font-bold">
                    <span
                        id="{{ $id }}_length">{{ strlen($value) ?? 0 }}</span>
                    <span>/</span>
                    <span>{{ $attributes->get('maxlength') }}</span>
                </div>
            @endif
        </div>
    @endif
</x-form.group>

@if ($attributes->get('type') === 'textarea' && $attributes->has('rich'))
    @push('js')
        <script defer>
            (function() {
                document.addEventListener('DOMContentLoaded', function() {
                    ClassicEditor.create(document.querySelector(
                        '#{{ $id }}'), {
                        toolbar: {
                            shouldNotGroupWhenFull: true
                        }
                    });
                });
            })();
        </script>
    @endpush
@endif

@if ($clear && $attributes->get('type') !== 'textarea' && !$attributes->has('rich'))
    @push('js')
        <script defer>
            (function() {
                document.addEventListener('DOMContentLoaded', function() {
                    const clrButton = document.querySelector(
                        '#{{ $id }}_clr_button');
                    if (clrButton) {
                        clrButton.addEventListener('click', function() {
                            document.querySelector(
                                    '#{{ $id }}').value =
                                '';
                        });
                    }
                });
            })();
        </script>
    @endpush
@endif

@if (!$attributes->has('rich') && $attributes->has('maxlength'))
    @push('js')
        <script defer>
            (function() {
                document.addEventListener('DOMContentLoaded', function() {
                    const element = document.querySelector(
                        '#{{ $id }}');
                    const currentLengthElement = document.querySelector(
                        '#{{ $id }}_length');
                    const lengthBlockElement = document.querySelector(
                        '#{{ $id }}_length_block');

                    element.addEventListener('keyup', (e) => {
                        const count = e.target.value.length;
                        currentLengthElement.innerText = count;

                        if (count >
                            {{ $attributes->get('maxlength') }}
                        ) {
                            lengthBlockElement.classList.add(
                                'text-red-600');
                        } else {
                            lengthBlockElement.classList.remove(
                                'text-red-600');
                        }
                    });
                });
            })();
        </script>
    @endpush
@endif
