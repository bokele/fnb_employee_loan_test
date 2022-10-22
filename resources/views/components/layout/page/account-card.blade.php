@props(['hashid', 'name'])

<a href="{{ route('support.account.overview', ['hashid' => $hashid]) }}" class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer group text-mc-dark">
    <x-icons.account-icon class="w-4 h-4" />
    <span class="flex-grow flex items-center ml-4 font-semibold min-h-[50px] group-hover:text-alert-success">
        {{ $name }}
    </span>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>
