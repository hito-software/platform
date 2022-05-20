@props(['type' => '', 'label' => '', 'icon'])

@php
$class = match ($type) { 'success' => 'hito-component__alert--success',  'danger' => 'hito-component__alert--danger',  'warn' => 'hito-component__alert--warn',  default => '' };

$icon = !empty($icon) ? $icon : match ($type) { 'success' => 'fas fa-check',  'danger' => 'fas fa-times',  'warn' => 'fas fa-exclamation',  default => 'fas fa-info' };
@endphp

@if (!empty($label))
    <x-hito::form.group>
        <x-hito::form.label>{{ $label }}</x-form.label>
        <div class="hito-component__alert {{ $class }}">
            <span class="hito-component__alert__icon"><i
                    class="{{ $icon }}"></i></span>
            <span>{{ $slot }}</span>
        </div>
    </x-form.group>
@else
    <div class="hito-component__alert {{ $class }}">
        <span class="hito-component__alert__icon"><i class="{{ $icon }}"></i></span>
        <span>{{ $slot }}</span>
    </div>
@endif
