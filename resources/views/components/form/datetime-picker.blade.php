<x-Hito::Form.Input :title="$title" :name="$name" :required="!empty($required) ? $required : null"
    :value="old($name, $value)"
    :disabled="$disabled"
    :clear="!$disabled && empty($required)" />

@if (!$disabled)
    @push('js')
        <script>
            (function() {
                document.addEventListener('DOMContentLoaded', function() {
                    flatpickr('#{{ $id }}', {
                        enableTime: {{ $enableTime ? 'true' : 'false' }},
                        dateFormat: '{{ $dateFormat }}',
                        time_24hr: true,
                        disableMobile: true,
                        @if (isset($enableCalendar))
                            noCalendar: {{ !$enableCalendar ? 'true' : 'false' }}
                        @endif
                    });
                }, {
                    once: true
                });
            })();
        </script>
    @endpush
@endif
