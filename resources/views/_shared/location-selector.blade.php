@can('users.update-own', \App\Models\User::class)
     <x-hito::Form.Select.Location name="user_location" :showTitle="false"
     :showPlaceholder="$showPlaceholder ?? true"
     :value="auth()->user()->location_id" :alerts="false"/>
@endcan

@push('js')
    <script>
        (function () {
            document.addEventListener('turbo:load', function () {
                const select = document.querySelector('#form_user_location');
                select.addEventListener('change', (e) => {
                    axios.patch('{{ route('ws.users.update', auth()->id()) }}', {
                        'location_id': e.target.value
                    }).then(() => {
                        window.location.reload();
                    });
                });
            }, {
                once: true
            });
        })();
    </script>
@endpush
