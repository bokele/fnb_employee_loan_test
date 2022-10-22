<form wire:submit.prevent="store" method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 place-items-start">

        <div class="w-full grid grid-cols-1 gap-5">
            <x-form.input-group>
                <x-form.label for="branch_name" value="Branch Name" />
                <x-form.input id="branch_name" type="text" placeholder="Name (MotorCheck)" name="branch_name"
                    wire:model.defer="branch_name" />
                <x-form.input-error for="branch_name"></x-form.input-error>
            </x-form.input-group>
            {{-- Phone number(s)--}}
            <x-form.input-group>
                <x-form.label for="phone_number" value="Phone number" />
                <x-form.input id="phone_number" type="text" placeholder="Phone number" name="phone_number"
                    wire:model.defer="phone_number" />
                <x-form.input-error for="phone_number"></x-form.input-error>
            </x-form.input-group>
            {{-- address(s) --}}
            <x-form.input-group>
                <x-form.label for="address" value="Address" />
                <x-form.input id="address" type="text" placeholder="Address" name="address"
                    wire:model.defer="address" />
                <x-form.input-error for="address"></x-form.input-error>
            </x-form.input-group>

            {{-- Comments--}}



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
                        Deleting a bank
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
