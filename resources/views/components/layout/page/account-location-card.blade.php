@props(['url' => null, 'location'])

<a href="{{ $url }}"
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group">

    <div class="flex-grow min-h-[50px]">
        @isset($location)
            <div class="flex items-center mb-2.5 group-hover:text-alert-success">
                <x-icons.location-icon class="w-4 h-4" />
                <h5 class="font-semibold text-lg ml-4">{{$location->name}}, {{$location->address_line_1}}</h5>
            </div>

            <p class="text-xs text-mcgray-350 mb-1">
                Contact: {{$location->first_name}} {{$location->last_name}}
            </p>

            <p class="text-xs underline text-alert-success mb-2.5">
                {{$location->phone}}
            </p>
            <p class="text-mcgray-350 flex items-center">
                <x-icons.users-icon class="w-3 h-3" />
                <x-alerts.badge total="3" class="ml-1.5" />
            </p>
        @else
            <p>App\Model\Location not passed to compenent</p>
        @endisset
    </div>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>
