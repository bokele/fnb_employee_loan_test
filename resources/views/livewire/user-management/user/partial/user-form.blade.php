<form wire:submit.prevent="store" method="POST">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 place-items-start">

        <div class="w-full grid grid-cols-1 gap-5">
            {{-- loanType --}}
            <x-form.input-group>
                <x-form.label for="branch" value="Branch" />
                <x-form.select id="branch" :options="$branchList" :show_default="true" default_value=""
                    default_text="Select Branc" name="branch" wire:model.defer="branch" />
                <x-form.input-error for="branch"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="name" value="Name" />
                <x-form.input id="name" type="text" placeholder="Name" name="name" wire:model.defer="name" />
                <x-form.input-error for="name"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="email" value="Email" />
                <x-form.input id="email" type="email" placeholder="Email" name="email" wire:model.defer="email" />
                <x-form.input-error for="email"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="phone_number" value="Phone Number" />
                <x-form.input id="phone_number" type="text" placeholder="Phone Number" name="phone_number"
                    wire:model.defer="phone_number" />
                <x-form.input-error for="phone_number"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="gender" value="Gender" />
                <x-form.select id="gender" :options="$genderList" :show_default="true" default_value=""
                    default_text="Select Gender" name="gender" wire:model.defer="gender" />
                <x-form.input-error for="gender"></x-form.input-error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.label for="jobType" value="Job Type" />
                <x-form.select id="jobType" :options="$jobTypeList" :show_default="true" default_value=""
                    default_text="Select Job Type" name="jobType" wire:model.defer="jobType"
                    wire:change="changeJobType" />
                <x-form.input-error for="jobType"></x-form.input-error>
            </x-form.input-group>
            @if($show_salary_base)
            <x-form.input-group>
                <x-form.label for="baseSalary" value="Base Salary" />
                <x-form.input id="baseSalary" type="number" step=".01" placeholder="Base Salary"
                    default_text="Select Job Type" name="baseSalary" wire:model.defer="baseSalary" />
                <x-form.input-error for="baseSalary"></x-form.input-error>
            </x-form.input-group>
            @endif
            {{-- Password --}}
            <x-form.input-group>
                <x-form.label for="password" value="Password" />
                <p class="text-xs">The new user will receive an email with instructions on verifying their email address
                    and
                    setting
                    their own password. The link in their email is valid for 24 hours. If the user needs a new link you
                    can
                    edit
                    the
                    user and "resend welcome mail".</p>
            </x-form.input-group>
            {{-- Rate--}}
            @if($roleList->count())
            <x-form.label for="role" value="Role(s)" />
            <x-form.input-group class="inline-flex space-x-3">
                @foreach($roleList as $id => $name)
                <x-form.checkbox id="roles-{{ $id }}" name="roles[]" wire:model.defer="roles.{{ $id }}"
                    value="{{ $id }}" />
                <x-form.label for="roles-{{ $id }}" value="{{ $name }}" />

                @endforeach
            </x-form.input-group>
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
