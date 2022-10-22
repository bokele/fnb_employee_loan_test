@props([
    'footer'
])

<div x-show="showFilter" 
    class="bg-mcgray-250 p-7 mb-7"
    x-cloak
>
    <div {{ $attributes->class(['grid grid-cols-1 sm:grid-cols-2 gap-x-7 gap-y-6 mb-7'])}}>
        {{ $slot }}
    </div>

    <div {{ $footer->attributes->class(['flex items-center justify-between']) }}>
        {{ $footer }}
    </div>
</div>