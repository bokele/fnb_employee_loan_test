<div id="sideBar"
    class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->



        <!-- link -->
        <a href="{{ route('dashboard') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <x-icons.dashboard-icon class="w-5 h-5" />
            {{ __('Dashboard') }}
        </a>
        <!-- end link -->
        {{-- @hasallroles('admin') --}}

        <!-- end link -->
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">
            <x-icons.cog-icon class="w-4 h-4" /> {{ __('Settings') }}
        </p>

        <!-- link -->
        <a href="{{route('admin.settings.branches.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Branch
        </a>
        <a href="{{route('admin.settings.loan-types.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Loan Type
        </a>
        <a href="{{route('admin.settings.collateral-types.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Collateral Type
        </a>

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">
            <x-icons.users-icon class="w-4 h-4" /> {{ __('User Management') }}
        </p>

        <!-- link -->
        <a href="{{route('admin.user-management.permissions.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Permision
        </a>
        <a href="{{route('admin.user-management.roles.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Role
        </a>
        <a href="{{route('admin.user-management.users.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            User
        </a>
        <!-- end link -->
        {{-- @endhasallroles --}}

        <!-- end link -->
        @hasallroles('staff|admin')
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">
            <x-icons.cog-icon class="w-4 h-4" /> {{ __('Loan Management') }}
        </p>

        <!-- link -->
        <a href="{{route('loan-management.get-loans.create')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            Get Loan
        </a>
        <a href="{{route('loan-management.get-loans.index')}}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-users text-xs mr-2"></i>
            List of Loan
        </a>
        @endhasallroles
    </div>
    <!-- end sidebar content -->

</div>
