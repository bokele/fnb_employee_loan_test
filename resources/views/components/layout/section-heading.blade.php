@props(['heading'])

<div class="bg-mc-black flex">
    <h2 class="flex-grow text-lg text-white font-semibold leading-5 py-5 pl-6 ">{{ $heading }}</h2>
    {{ $slot }}
</div>