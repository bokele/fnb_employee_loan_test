@props(['value'])

<p {{ $attributes->merge(['class' => 'block text-gray-400 text-xs italic mb-2.5 ']) }}>
    {{ $value ?? $slot }}
</p>

{{-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> --}}
