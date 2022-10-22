<div>
    <x-layout.section-heading heading="Create Collateral Type">

        <div class="flex">
            <x-layout.heading-icon-container route="admin.settings.collateral-types.index">
                <x-icons.cancel-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>

        </div>
    </x-layout.section-heading>

    <div class="bg-white shadow p-7" x-cloak>
        <div class="p-7 ">
            @include('livewire.settings.collateral-type.partial.collateral-type-form')
        </div>
    </div>
</div>
