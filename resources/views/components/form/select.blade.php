<x-hito::form.group>
    @if (!empty($title))
        <x-hito::form.label :for="$id" :required="$required">{{ $title }}
        </x-form.label>
    @endif

    @if ($disabled && ((!is_bool($value) && $value != 0 && empty($value)) || is_null($value)))
        <x-hito::alert>{!! __('hito::components.general.field-value-not-set', ['field' => strtolower($title)]) !!}</x-alert>
    @else
        <select name="{{ !empty($multiple) ? "{$name}[]" : $name }}"
            id="{{ $id }}"
            @if ($multiple ?? false) multiple @endif
            @if (!empty($disabled)) disabled @endif
            class="@error($name) border-red-600 @enderror block w-full rounded border py-2 px-4">
            @if (!empty($placeholder))
                <option value="">{{ $placeholder }}</option>
            @endif
            @foreach ($items as $item)
                @if (is_array(old($name, $value)))
                    <option value="{{ $item['value'] }}"
                        @if (in_array($item['value'], old($name, $value))) selected @endif>
                        {{ $item['label'] }}
                    </option>
                @elseif(is_string(old($name, $value)) || is_int(old($name, $value)))
                    )
                    <option value="{{ $item['value'] }}"
                        @if (old($name, $value) == $item['value']) selected @endif>
                        {{ $item['label'] }}
                    </option>
                @elseif(is_bool(old($name, $value)))
                    <option value="{{ (string) $item['value'] }}"
                        @if ((bool) old($name, $value) === (bool) $item['value']) selected @endif>
                        {{ $item['label'] }}
                    </option>
                @else
                    <option value="{{ $item['value'] }}">
                        {{ $item['label'] }}</option>
                @endif
            @endforeach
        </select>

        <div class="flex justify-between">
            <div>
                @if (!empty($note))
                    <x-hito::form.note>{{ $note }}</x-form.note>
                @endif
                <x-hito::form.error :name="$name"></x-form.error>
                <x-hito::form.error name="{{ $name }}.*"></x-form.error>
            </div>
        </div>
    @endif
</x-form.group>

@push('js')
    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                new Choices('#{{ $id }}', {
                    removeItemButton: true,
                    shouldSort: false,
                    loadingText: '{{ __('app.please-wait') }}',
                    noResultsText: '{{ __('app.no-results') }}',
                    noChoicesText: '{{ __('app.no-choice-available') }}',
                    itemSelectText: '{{ __('app.press-to-select') }}',
                    addItemText: (value) => {
                        return __(
                            'app.press-enter-to-add-value', {
                                value
                            });
                    },
                    maxItemText: (maxItemCount) => {
                        return __(
                            'app.only-max-values-can-be-added', {
                                max: maxItemCount
                            });
                    },
                });
            }, {
                once: true
            });
        })();
    </script>
@endpush
