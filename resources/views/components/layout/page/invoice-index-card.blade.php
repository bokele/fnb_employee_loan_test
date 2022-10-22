<a href="{{route('support.account.location.invoice.show', ['accountHashid' => 'HASHID', 'locationHashid' => 'HASHID', 'invoiceHashid' => 'HASHID']) }}" 
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group"
>
    {{-- <h5 class="list-group-card-heading">{{ card.created_at }} <span class="fw-regular">{{ card.invoice_number }}</span></h5>
    <!-- <p class="list-group-card-text icon icon-inline icon-location">{{ $invoice->location->name }}</p> -->

    <p class="list-group-card-text" v-if="card.status == 'not_paid'">
        <span class="text-danger">
            DUE
            {{ card.gross }}
        </span>
    </p>

    <p class="list-group-card-text" v-if="card.status == 'paid'">
        <span class="text-success">
            PAID
            {{ card.gross }}
        </span>
        {{ card.paid_at }}
    </p> --}}

    <div class="flex-grow min-h-[50px]">
        <div class="mb-2.5 group-hover:text-alert-success">
            <h5 class="text-lg">
                <span class="font-semibold">01/10/2022</span> 
                <span>1221-129922</span>
            </h5>
        </div>

        <p class="text-xs uppercase">
            <span class="text-alert-success">Paid</span> 
            <span class="text-mcgray-350">02/10/2022</span>
        </p>
    </div>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>