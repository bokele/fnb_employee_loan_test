@props(['title', 'defaultState' => true])
<div x-data="{open: {{$defaultState}}}">
    <div 
        class="flex items-center py-5 px-6 cursor-pointer uppercase font-semibold text-sm"
        :class="{ 'bg-mc-dark text-white' : open, 'bg-mcgray-200 text-mcgray-350 border-b border-mcgray-400 hover:text-mc-dark' : !open }"
        @click="open = !open"
        >
        <h3 class="flex-grow">{{$title ?? null }}</h3>

        <span :class="{'hidden' : !open}" x-cloak>
            <x-icons.chevron-up-icon class="w-4 h-4" />
        </span>
        <span :class="{'hidden' : open}" x-cloak>
            <x-icons.chevron-right-icon class="w-4 h-4" />
        </span>
    </div>

    <div x-show="open" x-cloak>
        {{$slot}}
    </div>
</div>