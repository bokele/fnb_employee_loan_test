<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Collateral Types">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="admin.settings.collateral-types.create">
                <x-icons.plus-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>
        </div>
    </x-layout.section-heading>

    <x-layout.section-index>



        <div class="grid grid-cols-1 ">

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>CREATE BY</x-table.th>
                        <x-table.th>TYPE</x-table.th>
                        <x-table.th>UPDATED AT</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($collateralTypes))
                    @foreach ($collateralTypes as $collateralType )


                    <x-table.tr>
                        <x-table.td>{{$collateralType->createdBy? $collateralType->createdBy->name : ""}}</x-table.td>
                        <x-table.td>{{$collateralType->type}}</x-table.td>
                        <x-table.td>{{$collateralType->updated_at}}</x-table.td>
                        <x-table.td><a title="Edit Collateral Type"
                                href="{{route('admin.settings.collateral-types.edit', $collateralType->hashid)}}">
                                <x-icons.edit-icon class="w-5 h-5" />
                                <a title="Collateral Type Detail"
                                    href="{{route('admin.settings.collateral-types.show', $collateralType->hashid)}}">
                                    <x-icons.info-circled-icon class="w-5 h-5" />
                                </a></x-table.td>
                    </x-table.tr>
                    @endforeach

                    @else
                    <x-table.tr>
                        <x-table.td colspan="4">NO DATA</x-table.td>

                    </x-table.tr>
                    @endif
                </x-table.body>

            </x-table.table>

        </div>

    </x-layout.section-index>

</div>
