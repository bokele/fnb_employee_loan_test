@props(['user', 'url' => null])

<a href="{{ $url }}"
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark hover:text-alert-success">
    <div class="flex-grow min-h-[50px]">
        @isset($user)
            <div class="flex items-center mb-2.5">
                <x-icons.users-icon class="w-4 h-4" />
                <span class="ml-4 font-semibold">
                    {{$user->name}}
                </span>
            </div>

            <div class="flex items-center text-xs text-mcgray-350 mb-2.5">
                <x-icons.email-icon class="w-3 h-3 " />
                <span class="ml-4 ">
                    {{$user->email}}
                </span>
            </div>

            <div class="flex items-center text-xs text-mcgray-350 mb-2.5">
                <x-icons.tags-icon class="w-3 h-3" />
                <span class="ml-4 ">
                    {{ trans('motorcheck.roles.' . $user->role) }}
                </span>
            </div>
        @else
            <p>App\Model\User not passed to compenent</p>
        @endisset

    </div>
    <x-icons.chevron-right-icon class="w-4 h-4" />
</a>
