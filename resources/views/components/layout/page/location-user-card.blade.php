@props(['url' => null, 'user'])

<a href="{{$url}}"
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group">
    <div class="flex-grow min-h-[50px]">
        @isset($user)
            <div class="flex items-center mb-2.5 group-hover:text-alert-success">
                <x-icons.users-icon class="w-4 h-4" />
                <h5 class="font-semibold font-lg ml-4">{{$user->name}}</h5>
            </div>

            <div class="flex items-center text-xs text-mcgray-350 mb-2">
                <x-icons.reports-icon class="w-4 h-4" />
                <span class="flex-grow ml-2">Checks: 0</span>
            </div>
        @else
            <p>App\Model\User not passed to compenent</p>
        @endisset
    </div>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>
