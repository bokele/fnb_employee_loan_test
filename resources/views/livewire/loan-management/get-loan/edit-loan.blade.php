<div>
    <x-layout.section-heading heading="Get Loan">

        <div class="flex">
            <x-layout.heading-icon-container route="loan-management.get-loans.index">
                <x-icons.cancel-icon class=" w-5 h-5" />
            </x-layout.heading-icon-container>

        </div>
    </x-layout.section-heading>

    <div class="bg-white shadow p-7" x-cloak>

        <div class="p-7 ">
            @include('livewire.loan-management.get-loan.partial.get-loan-form')
        </div>
    </div>
</div>
