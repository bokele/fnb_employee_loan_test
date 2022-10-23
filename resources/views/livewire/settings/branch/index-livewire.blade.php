<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Branches">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="admin.settings.branches.create">
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
                        <x-table.th>PHONE NUMBER</x-table.th>
                        <x-table.th>ADDRESS</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($branches))
                    @foreach ($branches as $branch )
                    <x-table.tr>
                        <x-table.td>{{$branch->branch_name}}</x-table.td>
                        <x-table.td>{{$branch->phone_number}}</x-table.td>
                        <x-table.td>{{$branch->address}}</x-table.td>
                        <x-table.td><a title="Edit the bank"
                                href="{{route('admin.settings.branches.edit', $branch->hashid)}}">
                                <x-icons.edit-icon class="w-5 h-5" />
                            </a></x-table.td>
                    </x-table.tr>
                    @endforeach

                    @else
                    <x-table.tr>
                        <x-table.td colspan="4">No Data</x-table.td>

                    </x-table.tr>
                    @endif
                </x-table.body>

            </x-table.table>

        </div>

    </x-layout.section-index>

</div>
