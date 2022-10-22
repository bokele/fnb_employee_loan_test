<div>
    <x-layout.section-heading heading="Loan Type Detail">

        <div class="flex">
            <x-layout.heading-icon-container route="admin.settings.loan-types.index">
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
                        <x-table.td>{{$loanType->createdBy? $loanType->createdBy->name : ""}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>LOAN TYPE</x-table.td>
                        <x-table.td>{{$loanType->type}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>RATE</x-table.td>
                        <x-table.td>{{$loanType->rate}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>CREATED AT</x-table.td>
                        <x-table.td>{{$loanType->updated_at}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>UPDATED AT</x-table.td>
                        <x-table.td>{{$loanType->updated_at}}</x-table.td>
                    </x-table.tr>
                </x-table.body>
            </x-table.table>

        </div>
    </div>
</div>
