<span
    class="w-14 h-full flex items-center justify-center cursor-pointer border-b border-b-black border-r "
    :class="{'bg-white text-alert-success border-r-white hover:text-mcgray-350' : showSearch, 'text-mcgray-350 bg-mc-dark hover:text-white' : !showSearch}"
    x-on:click="showSearch = !showSearch"
>
    {{ $slot }}
</span>