<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Loan Types">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="admin.settings.loan-types.create">
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
                        <x-table.th>LOAN TYPE</x-table.th>
                        <x-table.th>RATE</x-table.th>
                        <x-table.th>UPDATED AT</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($loanTypes))
                    @foreach ($loanTypes as $loanType )


                    <x-table.tr>
                        <x-table.td>{{$loanType->createdBy? $loanType->createdBy->name : ""}}</x-table.td>
                        <x-table.td>{{$loanType->type}}</x-table.td>
                        <x-table.td>{{$loanType->rate}}</x-table.td>
                        <x-table.td>{{$loanType->updated_at}}</x-table.td>
                        <x-table.td><a title="Edit Loan Type"
                                href="{{route('admin.settings.loan-types.edit', $loanType->hashid)}}">
                                <x-icons.edit-icon class="w-5 h-5" />
                                <a title="Loan Type Detail"
                                    href="{{route('admin.settings.loan-types.show', $loanType->hashid)}}">
                                    <x-icons.info-circled-icon class="w-5 h-5" />
                                </a></x-table.td>
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
