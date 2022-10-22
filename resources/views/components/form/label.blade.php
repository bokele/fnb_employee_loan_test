@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-display text-base text-mc-dark font-semibold mb-2.5 ']) }}>
    {{ $value ?? $slot }}
</label>