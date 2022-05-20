<x-hito::form.group>
    <button type="submit" {{ $attributes }}
        class="block w-full rounded-lg bg-green-600 p-4 font-bold uppercase tracking-wide text-white hover:bg-green-500 focus:bg-green-500">
        {{ $slot }}
    </button>
</x-form.group>
