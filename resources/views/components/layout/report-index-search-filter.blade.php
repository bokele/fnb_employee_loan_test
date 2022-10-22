<div x-show="showSearch" 
    class="bg-mcgray-250 p-7 mb-7"
    x-cloak
>
    <div {{ $attributes->class(['flex items-center gap-x-7 gap-y-6 mb-7'])}}>
        {{ $slot }}
    </div>
</div>