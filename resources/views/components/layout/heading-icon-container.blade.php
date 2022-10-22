@props(['route', 'routeParameters' => []])
<a href="{{ isset($route) ? route($route, $routeParameters) : null}}"
    class="w-14 h-full flex items-center justify-center text-mcgray-350 bg-mc-dark border-r border-black hover:text-white active:bg-white active:text-mc-dark">
    {{ $slot }}
</a>
