<form wire:submit.prevent="store" method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 place-items-start">

        <div class="w-full grid grid-cols-1 gap-5">
            {{-- loanType --}}
            <x-form.input-group>
                <x-form.label for="loanType" value="Loan Type" />
                <x-form.input id="loanType" type="text" placeholder="Loan Type" name="loanType"
                    wire:model.defer="loanType" />
                <x-form.input-error for="loanType"></x-form.input-error>
            </x-form.input-group>
            {{-- Rate--}}
            <x-form.input-group>
                <x-form.label for="rate" value="Rate" />
                <x-form.input id="rate" type="number" step=".01" placeholder="Rate" name="rate"
                    wire:model.defer="rate" />
                <x-form.input-error for="rate"></x-form.input-error>
            </x-form.input-group>



        </div>
        <div class="col-span-2 mt-10">
            <x-form.button-submit>
                Save
            </x-form.button-submit>
        </div>

        {{-- On edit form show delete option --}}
        @isset($hashid)
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.delete-modal>
                    <x-slot:title>
                        Deleting Loan Type
                    </x-slot:title>

                    <p class="my-2.5">Deleting will delete this bank completely and they will no longer be able to
                        access the system.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>
                </x-layout.delete-modal>
            </div>
        </div>
        @endisset

    </div>
</form>
