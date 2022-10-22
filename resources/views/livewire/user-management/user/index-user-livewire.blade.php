<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Users">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="admin.user-management.users.create">
                <x-icons.plus-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>
        </div>
    </x-layout.section-heading>

    <x-layout.section-index>



        <div class="grid grid-cols-1 ">

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>BRACH</x-table.th>
                        <x-table.th>ROLE</x-table.th>
                        <x-table.th>NAME</x-table.th>
                        <x-table.th>JOB TYPE</x-table.th>
                        <x-table.th>UPDATED AT</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($users))
                    @foreach ($users as $user )

                    <x-table.tr>
                        <x-table.td>
                            {{ $user->branch ? $user->branch->branch_name : ""
                            }}</x-table.td>
                        <x-table.td>
                            @if (count($user->roles))
                            @foreach($user->roles as $role)
                            <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{ $role->name
                                }}</span>
                            @endforeach
                            @endif
                        </x-table.td>

                        <x-table.td>
                            {{$user->name}}
                        </x-table.td>
                        <x-table.td>
                            {{$user->job_type}}
                        </x-table.td>
                        <x-table.td>
                            {{$user->created_at}}
                        </x-table.td>
                        <x-table.td><a title="Edit Loan Type"
                                href="{{route('admin.user-management.users.edit', $user->id)}}">
                                <x-icons.edit-icon class="w-5 h-5" />
                        </x-table.td>
                    </x-table.tr>

                    @endforeach
                    @else
                    <x-table.tr>
                        <x-table.td colspan="5">NO DATA</x-table.td>

                    </x-table.tr>

                    @endif

                </x-table.body>

            </x-table.table>

        </div>
        @if($users->links())
        <div class="mt-4">
            {{ $users->links() }}
        </div>
        @endif
    </x-layout.section-index>


</div>
