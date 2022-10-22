<div>
    <x-layout.section-heading heading="Loan Type Detail">

        <div class="flex">
            <x-layout.heading-icon-container route="admin.settings.collateral-types.index">
                <x-icons.cancel-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>

        </div>
    </x-layout.section-heading>

    <div class="bg-white shadow p-7" x-cloak>

        <div class="p-7 ">
            <x-table.table>
                <x-table.body>
                    <x-table.tr>
                        <x-table.td>CREATE BY</x-table.td>
                        <x-table.td>{{$collateralType->createdBy? $collateralType->createdBy->name : ""}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>COLLATERAL TYPE</x-table.td>
                        <x-table.td>{{$collateralType->type}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>CREATED AT</x-table.td>
                        <x-table.td>{{$collateralType->updated_at}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>UPDATED AT</x-table.td>
                        <x-table.td>{{$collateralType->updated_at}}</x-table.td>
                    </x-table.tr>
                </x-table.body>
            </x-table.table>

        </div>
    </div>
</div>
