<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Permissions">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="admin.user-management.permissions.create">
                <x-icons.plus-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>
        </div>
    </x-layout.section-heading>

    <x-layout.section-index>



        <div class="grid grid-cols-1 ">

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>NAME</x-table.th>
                        <x-table.th>UPDATED AT</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($permissions))
                    @foreach ($permissions as $permission )

                    <x-table.tr>
                        <x-table.td>{{$permission->name}}</x-table.td>
                        <x-table.td>{{$permission->updated_at}}</x-table.td>
                        <x-table.td><a title="Edit Loan Type"
                                href="{{route('admin.user-management.permissions.edit', $permission->id)}}">
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

    </x-layout.section-index>

</div>