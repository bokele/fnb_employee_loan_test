<form wire:submit.prevent="store" method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 place-items-start">

        <div class="w-full grid grid-cols-1 gap-5">
            {{-- loanType --}}
            <x-form.input-group>
                <x-form.label for="loanDurationType" value="Loan Duration Type" />
                <x-form.select id="loanDurationType" :options="$loanDurationtypeList" :show_default="true"
                    default_value="" default_text="Select Loan Duration Type" name="loanDurationType"
                    wire:model.defer="loanDurationType" />
                <x-form.input-error for="loanDurationType"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="loanDuration" value="Loan Duration" />
                <x-form.input id="loanDuration" type="number" placeholder="Loan Duration" name="loanDuration"
                    wire:model.defer="loanDuration" />
                <x-form.input-error for="loanDuration"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="loanType" value="Loan Type" />
                <x-form.select id="loanType" :options="$loanTypeList" :show_default="true" default_value=""
                    default_text="Select Loan Type" name="loanType" wire:model.defer="loanType"
                    wire:change="changeLoanType" />
                <x-form.input-error for="loanType"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="interestRate" value="Interest Rate" />
                <x-form.input id="interestRate" type="text" placeholder="Interest Rate" name="interestRate"
                    wire:model.defer="interestRate" />
                <x-form.input-error for="interestRate"></x-form.input-error>
            </x-form.input-group>

            <x-form.input-group>
                <x-form.label for="principal" value="Principal" />
                <x-form.input id="principal" type="number" placeholder="Principal" name="principal"
                    wire:model.defer="principal" />
                <x-form.input-error for="principal"></x-form.input-error>
            </x-form.input-group>

            <x-form.input-group>
                <x-form.label for="comment" value="Comment" />
                <x-form.text-area id="comment" placeholder="Comment" name="comment" wire:model.defer="comment" />
                <x-form.input-error for="comment"></x-form.input-error>
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
                        Deleting Role
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
