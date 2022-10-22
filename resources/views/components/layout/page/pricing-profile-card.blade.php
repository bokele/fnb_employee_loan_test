@props(['hashid', 'name', 'description', 'default'])

<a href="{{route('support.pricing-profile.show', ['hashid' => $hashid])}}" class="flex items-center group bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark hover:text-alert-success">
    <span class="flex-grow ml-4 min-h-[50px]">
        <h5 class="text-base my-2.5 font-semibold">{{ $name }}</h5>
        <p class="text-xs mb-2.5 text-mcgray-350">{{ $description }}</p>
        <p class="text-xs mb-2.5 text-mcgray-350">Default: {{ $default ? 'Yes' : 'No'}}</p>
    </span>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-350 group-hover:text-alert-success" />
</a>
