<div x-data="{showFilter: false}">
    <x-layout.section-heading heading="List of Loan">

        <div class="flex">
            {{-- Filter --}}
            <x-layout.heading-icon-container route="loan-management.get-loans.create">
                <x-icons.plus-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>
        </div>
    </x-layout.section-heading>

    <x-layout.section-index>



        <div class="grid grid-cols-1 ">

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>STATUS</x-table.th>
                        <x-table.th>NAME</x-table.th>
                        <x-table.th>LOAN TYPE</x-table.th>
                        <x-table.th>RATE</x-table.th>
                        <x-table.th>PRINCIPAL</x-table.th>
                        <x-table.th>INTEREST</x-table.th>
                        <x-table.th>LOAN TOTAL AMOUNT</x-table.th>
                        <x-table.th>LOAN BALANCE</x-table.th>
                        <x-table.th>lOAN DURATION</x-table.th>
                        <x-table.th>UPDATED AT</x-table.th>
                        <x-table.th>ACTIONS</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @if (count($loans))
                    @foreach ($loans as $loan )

                    <x-table.tr>
                        <x-table.td>
                            @if ($loan->loan_status == "draft")
                            <span
                                class="rounded-xl bg-orange-300 px-2 py-1 text-xs text-orange-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "pending")
                            <span
                                class="rounded-xl bg-yellow-300 px-2 py-1 text-xs text-yellow-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "verified")
                            <span
                                class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "approved")
                            <span
                                class="rounded-xl bg-emerald-300 px-2 py-1 text-xs text-emerald-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "disbursed")
                            <span
                                class="rounded-xl bg-green-300 px-2 py-1 text-xs text-green-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "denied")
                            <span
                                class="rounded-xl bg-red-300 px-2 py-1 text-xs text-red-700">{{$loan->loan_status}}</span>
                            @endif
                        </x-table.td>

                        <x-table.td>{{$loan->user ? $loan->user->name : ""}}</x-table.td>
                        <x-table.td>{{$loan->loanType ? $loan->loanType->type : ""}}</x-table.td>
                        <x-table.td>{{$loan->interest_rate}}</x-table.td>
                        <x-table.td>@money($loan->principal)</x-table.td>
                        <x-table.td>@money($loan->loan_interest)</x-table.td>
                        <x-table.td>@money($loan->loan_total_amount)</x-table.td>
                        <x-table.td>@money($loan->loan_balance_amount)</x-table.td>
                        <x-table.td>{{$loan->loan_duration}} {{$loan->loan_duration_type}}</x-table.td>
                        <x-table.td>{{$loan->updated_at}}</x-table.td>
                        <x-table.td>
                            @if ($loan->loan_status == "draft" )
                            <a title="Edit Loan" href="{{route('loan-management.get-loans.edit', $loan->hashid)}}">
                                <x-icons.edit-icon class="w-5 h-5" />
                                @endif
                                <a title="Edit Loan" href="{{route('loan-management.get-loans.show', $loan->hashid)}}">
                                    <x-icons.info-circled-icon class="w-5 h-5" />
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
