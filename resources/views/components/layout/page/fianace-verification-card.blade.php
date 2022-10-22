@props(['hashid', 'name'])
<div class="bg-mcgray-250  rounded-sm shadow cursor-pointer">
    <a href="{{ route('support.account.overview', ['hashid' => 'hashid']) }}"
        class=" flex items-center p-6 rounded-sm  cursor-pointer group text-mc-dark">
        <div class="flex-grow min-h-[50px]">
            <div class="mb-3">
                <x-sections.reg-input />
            </div>

            <p class="text-xs text-mcgray-350 mb-1 ">
                <x-icons.location-icon class="w-4 h-4" /> 03/03/2022 16:10
            </p>
            <p class="text-xs text-mcgray-350 mb-1">
                <x-icons.location-icon class="w-4 h-4" /> Location or Address
            </p>
            <p class="text-xs text-mcgray-350 mb-1">
                <x-icons.users-icon class="w-4 h-4" /> User Full Name
            </p>
            <p class="text-xs text-mcgray-350 mb-1">
                <x-icons.car-finance-icon class="w-4 h-4" /> Bank
            </p>

        </div>

        <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />




    </a>

    <!-- Active: "bg-gray-100", Not Active: "" -->
    <a href="#"
        class="bg-alert-info hover:bg-mcinfo-50 w-64 px-6 py-1 rounded-sm   uppercase font-semibold  text-white">...Pending</a>
    <a href="#"
        class="bg-alert-info hover:bg-mcinfo-50 w-64 px-6  py-1  rounded-sm   uppercase font-semibold  text-white">Verify</a>
</div>
