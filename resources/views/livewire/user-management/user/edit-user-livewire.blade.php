<div>
    <x-layout.section-heading heading="Edit User">

        <div class="flex">
            <x-layout.heading-icon-container route="admin.user-management.users.index">
                <x-icons.cancel-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>

        </div>
    </x-layout.section-heading>

    <div class="bg-white shadow p-7" x-cloak>

        <div class="p-7 ">
            @include('livewire.user-management.user.partial.user-form')
        </div>
    </div>
</div>
