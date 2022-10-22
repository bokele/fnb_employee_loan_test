<form wire:submit.prevent="store" method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 place-items-start">

        <div class="w-full grid grid-cols-1 gap-5">
            {{-- loanType --}}
            <x-form.input-group>
                <x-form.label for="name" value="Name" />
                <x-form.input id="name" type="text" placeholder="Name" name="name" wire:model.defer="name" />
                <x-form.input-error for="name"></x-form.input-error>
            </x-form.input-group>
            {{-- Rate--}}
            @if($roleList->count())
            @foreach($roleList as $id => $name)
            <x-form.input-group>
                <x-form.label for="roles-{{ $id }}" value=">{{ $name }}" />
                <x-form.checkbox id="roles-{{ $id }}" name="roles[]" wire:model.defer="roles" />
            </x-form.input-group>
            @endforeach
            @endif

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
