<span
    class="w-14 h-full flex items-center justify-center cursor-pointer border-b border-b-black border-r "
    :class="{'bg-white text-alert-success border-r-white hover:text-mcgray-350' : showFilter, 'text-mcgray-350 bg-mc-dark hover:text-white border-r-black' : !showFilter}"
    x-on:click="showFilter = !showFilter"
>
    {{ $slot }}
</span>