@props(['route', 'getActive'])
    
<div 
    class="{{ BladeHelper::getActive($getActive, 'bg-alert-error')}}"
    x-cloak>

    @php
        $class = BladeHelper::getActive($getActive, 'fill-white text-white', 'fill-mc-menu text-mc-menu');
    @endphp
    <a 
        title="{{$slot}}" 
        href="{{route($route)}}"
        class="h-[60px] flex items-center hover:fill-mc-white hover:text-white {{ $class }}"
        :class="{ 'flex-col justify-center w-[60px]' : !sidebarOpen, 'w-[290px] pl-5' : sidebarOpen}"    
    >            
        {{ $icon }}
        <span 
            class="font-bold"
            :class="{'hidden mt-1' : !sidebarOpen, 'block ml-3' : sidebarOpen}">
            {{$slot}}
        </span>
    </a>
</div>