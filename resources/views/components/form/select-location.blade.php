<div class="space-y-2 w-full">
    <x-hito::Form.Select :title="$title" :note="$note" :items="$items" :name="$name" :value="$value" :multiple="$multiple"
                         :disabled="$disabled"
                   :placeholder="$placeholder" :required="$required" :clear="false"></x-hito::Form.Select>

    @if (!count($items) && $attributes->get('alerts') !== false)
        <x-hito::alert type="{{ $required ? 'danger' : '' }}">There are no locations available, please contact an administrator.</x-hito::alert>
    @endif
</div>
