<div>
    <x-layout.section-heading heading="Loan Detail N. {{$loan->loan_reference_number}}">

        <div class="flex">
            <x-layout.heading-icon-container route="loan-management.get-loans.index">
                <x-icons.cancel-icon class="w-5 h-5" />
            </x-layout.heading-icon-container>

        </div>
    </x-layout.section-heading>

    <div class="bg-white shadow p-7" x-cloak>

        <div class="p-7 ">
            <x-table.table>
                <x-table.body>
                    <x-table.tr>
                        <x-table.td>STATUS</x-table.td>
                        <x-table.td>


                            @if ($loan->loan_status == "draft")
                            <span
                                class="rounded-xl bg-orange-300 px-2 py-1 text-xs text-orange-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "pending")

                            @if ($loan->created_by == auth()->id())
                            <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">Submited
                            </span>
                            @else
                            <span class="rounded-xl bg-yellow-300 px-2 py-1 text-xs text-yellow-700">
                                {{$loan->loan_status}}
                            </span>
                            @endif

                            @endif
                            @if ($loan->loan_status == "verified")
                            <span
                                class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "approved")
                            <span
                                class="rounded-xl bg-green-300 px-2 py-1 text-xs text-green-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "disbursed")
                            <span
                                class="rounded-xl bg-green-300 px-2 py-1 text-xs text-green-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "denied")
                            <span
                                class="rounded-xl bg-red-300 px-2 py-1 text-xs text-red-700">{{$loan->loan_status}}</span>
                            @endif
                            @if ($loan->loan_status == "paid")
                            <span
                                class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{$loan->loan_status}}</span>
                            @endif

                        </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>NEXT LOAN DATE</x-table.td>
                        <x-table.td>{{$loan->next_date}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>LOAN TYPE</x-table.td>
                        <x-table.td>{{$loan->loanType->type}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>RATE</x-table.td>
                        <x-table.td>{{$loan->interest_rate}} %</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>PRINCIPAL</x-table.td>
                        <x-table.td>@money($loan->principal) </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>LOAN INTEREST</x-table.td>
                        <x-table.td>@money($loan->loan_interest) </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>LOAN TOTAL AMOUNT</x-table.td>
                        <x-table.td>@money($loan->loan_total_amount) </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>LOAN BALANCE</x-table.td>
                        <x-table.td>@money($loan->loan_balance_amount) </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>lOAN DURATION</x-table.td>
                        <x-table.td>{{$loan->loan_duration}} {{$loan->loan_duration_type}} </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>VERIFIED AT & BY</x-table.td>
                        <x-table.td>{{$loan->verified_at }} {{$loan->verifiedBy ? ' & '.$loan->verifiedBy->name : ""}}
                        </x-table.td>
                    </x-table.tr>

                    <x-table.tr>
                        <x-table.td>APPROVED AT & BY</x-table.td>
                        <x-table.td>{{$loan->approved_at}} {{$loan->approvedBy ? ' & '.$loan->approvedBy->name : ""}}
                        </x-table.td>
                    </x-table.tr>

                    <x-table.tr>
                        <x-table.td>DISBURSED AT & BY</x-table.td>
                        <x-table.td>{{$loan->disbursed_at}} {{$loan->disbursedBy ? ' & '.$loan->disbursedBy->name : ""}}
                        </x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>CREATE AT & BY</x-table.td>
                        <x-table.td>{{$loan->updated_at}}, {{$loan->user ? $loan->user->name : ""}}</x-table.td>
                    </x-table.tr>
                    <x-table.tr>
                        <x-table.td>UPDATED AT</x-table.td>
                        <x-table.td>{{$loan->updated_at}}</x-table.td>
                    </x-table.tr>
                </x-table.body>
            </x-table.table>

        </div>
        <div class="p-7 ">
            <p>Comment or Desciption</p>
            <p>{{$loan->description}}</p>
        </div>

        @if (count($loan->loanComments))
        @foreach ($loan->loanComments as $comment )
        <div class="p-7 ">
            <p>Commented By {{$comment->commentedBy ? $comment->commentedBy->name : ""}}, {{$comment->created_at}}</p>
            <p>{{$comment->comment}}</p>
        </div>
        @endforeach
        @endif

        @isset($hashid)
        @if ($loan->loan_status == "draft")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.submit-loan-modal>
                    <x-slot:title>
                        Submit The Form
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>
                </x-layout.submit-loan-modal>
            </div>
        </div>
        @endif

        @hasallroles('admin')

        @if ($loan->loan_status == "pending")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.verified-loan-modal>
                    <x-slot:title>
                        Verify the Loan
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>

                    <x-form.input-group>
                        <x-form.label for="comment" value="Comment" />
                        <x-form.text-area id="comment" placeholder="Comment" name="comment"
                            wire:model.defer="comment" />
                        <x-form.input-error for="comment"></x-form.input-error>
                    </x-form.input-group>
                </x-layout.verified-loan-modal>
            </div>
        </div>
        @endif

        @if ($loan->loan_status == "verified")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.approved-loan-modal>
                    <x-slot:title>
                        Approve the Loan
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>

                    <x-form.input-group>
                        <x-form.label for="comment" value="Comment" />
                        <x-form.text-area id="comment" placeholder="Comment" name="comment"
                            wire:model.defer="comment" />
                        <x-form.input-error for="comment"></x-form.input-error>
                    </x-form.input-group>
                </x-layout.approved-loan-modal>
            </div>
        </div>
        @endif

        @if ($loan->loan_status == "approved")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.disbursed-loan-modal>
                    <x-slot:title>
                        Disburse the Loan
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>

                    <x-form.input-group>
                        <x-form.label for="comment" value="Comment" />
                        <x-form.text-area id="comment" placeholder="Comment" name="comment"
                            wire:model.defer="comment" />
                        <x-form.input-error for="comment"></x-form.input-error>
                    </x-form.input-group>
                </x-layout.disbursed-loan-modal>
            </div>
        </div>
        @endif

        @if ($loan->loan_status == "disbursed")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.paid-loan-modal>
                    <x-slot:title>
                        Mark As Paid Loan
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>

                    <x-form.input-group>
                        <x-form.label for="comment" value="Comment" />
                        <x-form.text-area id="comment" placeholder="Comment" name="comment"
                            wire:model.defer="comment" />
                        <x-form.input-error for="comment"></x-form.input-error>
                    </x-form.input-group>
                    </x-layout.pa-loan-modal>
            </div>
        </div>
        @endif

        @if ($loan->loan_status == "approved" || $loan->loan_status == "verified" || $loan->loan_status == "pending")
        <div class="bg-mcgray-250">
            <div class="mt-5">
                <x-layout.denied-loan-modal>
                    <x-slot:title>
                        Deny Loan
                    </x-slot:title>

                    <p class="my-2.5">Submiting this form your aggres to the tems. & conds.</p>

                    <p class="my-2.5 font-semibold">Are you sure?</p>

                    <x-form.input-group>
                        <x-form.label for="comment" value="Comment" />
                        <x-form.text-area id="comment" placeholder="Comment" name="comment"
                            wire:model.defer="comment" />
                        <x-form.input-error for="comment"></x-form.input-error>
                    </x-form.input-group>

                </x-layout.denied-loan-modal>
            </div>
        </div>
        @endif

        @endhasallroles

        @endisset
    </div>
</div>
