<x-hito::form.group>
    @if (!empty($title))
        <x-hito::form.label :for="$id" :required="$required">{{ $title }}
        </x-form.label>
    @endif

    @if ($disabled && empty($value))
        <x-hito::alert>{!! __('hito::components.general.field-value-not-set', ['field' => strtolower($title)]) !!}</x-alert>
    @else
        <div class="flex justify-between">
            <div>
                @if (!empty($note))
                    <x-hito::form.note>{{ $note }}</x-form.note>
                @endif
                <x-hito::form.error :name="$name"></x-form.error>
                <x-hito::form.error name="{{ $name }}.*"></x-form.error>
            </div>
        </div>

        <div
            @if ($disabled) class="border py-2 px-4 rounded w-full @error($name) border-red-600 @enderror" @endif>
            <hito-list-input name="{{ $name }}"
                value='@json(old($name, empty($value) ? [] : $value))'
                max="{{ $max }}"
                @if ($disabled) disabled="true" @endif>
            </hito-list-input>
        </div>
    @endif
</x-form.group>
