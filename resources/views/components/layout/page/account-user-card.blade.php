@props(['user'])


<a href="{{route('support.user.account.show', ['accountHashid' => 'HASHID', 'hashid' => 'hashid']) }}"
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group">
    <div class="flex-grow min-h-[50px]">
        <div class="flex items-center mb-2.5 group-hover:text-alert-success">
            <x-icons.users-icon class="w-4 h-4" />
            <h5 class="font-semibold font-lg ml-4">{{$user->name}}</h5>
            <span class="ml-2 text-xs text-mcgray-300 uppercase">{{ trans('motorcheck.roles.'.$user->role) }}</span>
        </div>

        @php
            //@todo review
            $location = null;
            if ($user->hasRole('customerAccountAdmin')) {
                $location = 'All Locations';
            } else {
                $location = optional($user->locations)->first();

                if ($location != null ) {
                    $location = $location->name . ' , ' . $location->address_line_1;
                }
            }
        @endphp
        <div class="flex items-center text-xs text-mcgray-350 mb-2">
            <x-icons.location-icon class="w-4 h-4" />
            <span class="flex-grow ml-2">{{ $location }}</span>
        </div>
    </div>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>
