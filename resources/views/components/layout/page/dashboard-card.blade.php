@props(['title', 'route', 'count', 'cta' => 'View'])

<div class="w-full p-6 bg-white shadow border border-mcgray-100 flex flex-col items-center justify-top rounded-sm ">
    <h2 class="flex-grow flex flex-col items-center justify-top">
        <div class="relative text-mcgray-300">
            @isset($count)
                @if ($count > 0)
                    <span class="absolute -top-3 -right-6 min-w-[2em] min-h-[2em] px-1.5 flex items-center justify-center rounded-full bg-alert-success text-white font-bold text-sm ">
                        {{ $count }}
                    </span>
                @endif
            @endisset
            {{ $icon }}
        </div>

        <span class="text-2xl font-bold block text-center mt-2.5">
            {{ $title }}
        </span>

        @isset($subheading)
            {{$subheading}}
        @endisset
        
    </h2>
    <a class="mt-2.5 rounded-2xl uppercase border border-alert-success py-1.5 px-4 text-sm text-alert-success font-bold hover:bg-alert-success hover:text-white" 
        href="{{route($route)}}"
    >
        {{ $cta }}
    </a>
</div>