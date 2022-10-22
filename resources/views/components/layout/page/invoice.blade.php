<?php
/**
 * Partial: The support and customer admin sections essentially show the same invoice
 * but with small differences around making/marking payments
 *
 * @link       http://www.devhaus.ie
 * @see        /resources/views/support/invoice/show.blade.php
 * @see        /resources/views/app/admin/billing/invoice/show.blade.php
 */
?>
<div class="p-7">

    <div class="text-sm text-mc-dark">
        <img src="{{asset('images/MC_Logo_2-Colour_Pos.png')}}" alt="MotorCheck" class="w-52 mb-2.5">

        <p class="font-bold">Invoice {{--{{trans('motorspecs.invoice_type.' . $invoice->type)}}--}}</p>
        <p class="mb-2.5">#201704-1023 {{--#{{$invoice->invoice_number}} --}}</p>
                        
        <p class="font-bold">Location Name {{-- {{$invoice->location->name}} --}} </p>
            
        <p class="mb-2.5">{{-- {!!$invoice->location->addressArray->implode('<br>')!!} --}}
            Address Line 1 <br>
            Address Line 2 <br>
            City<br>
            County<br>
        </p>
        
        <div class="flex items-center">
            <p class="flex-grow">
                Date: 01/10/2022 <br>
                Paid: 02/10/2022
                {{-- Date: {{formatDate($invoice->created_at)}}
                @if($invoice->isPaid)
                    <br>Paid: {{formatDate($invoice->paid_at)}}
                @else
                    <br>Due: {{formatDate($invoice->due_at)}}
                @endif --}}
            </p>
            <p class="font-bold text-2xl">
                {{-- {{formatAsGbp($invoice->gross)}} --}}
                £10.00
            </p> 
        </div>

        <div class="flex justify-end">
            <span>
                <span class="text-xl uppercase font-bold text-alert-success">
                    Paid
                </span>             
            
                {{--
                @if($invoice->isPaid)
                    <span class="invoice-paid">Paid</span>
                    <span class="text-xl uppercase font-bold text-alert-success">
                        Paid
                    </span>                         
                @elseif($support)
                    <a href="{{$markPaidUrl}}" class="btn btn-outline-success">Mark Paid</a>
                    <a 
                        href="#"
                        class="flex items-center justify-center border border-alert-success hover:bg-alert-success rounded-full text-alert-success hover:text-white font-bold text-sm py-1 px-4 uppercase"
                    >
                        <span class="uppercase ml-2">Mark Paid</span>
                    </a>                         
                @elseif($invoice->type != 'manual_credit_invoice')
                    <a href="{{route('app.admin.billing.payment.create')}}" class="btn btn-outline-success">Pay Now</a>
                    <a 
                        href="#"
                        class="flex items-center justify-center border border-alert-success hover:bg-alert-success rounded-full text-alert-success hover:text-white font-bold text-sm py-1 px-4 uppercase"
                    >
                        <span class="uppercase ml-2">Pay Now</span>
                    </a>                         
                @endif --}}
            </span>
        </div>
    </div>

    <div class="mt-2.5">
        <x-table.table>
            <x-table.head>
                <x-table.th>Unit</x-table.th>
                <x-table.th>Description</x-table.th>
                <x-table.th>Per Unit</x-table.th>
                <x-table.th>Net</x-table.th>
                <x-table.th>VAT</x-table.th>
                <x-table.th>Gross</x-table.th>            
            </x-table.head>            

            <x-table.body>
                {{-- @foreach($invoice->lineItems as $item) --}}
                    <x-table.tr>
                        <x-table.td class="border-0 font-bold">1</x-table.td>
                        <x-table.td class="border-0"> Description</x-table.td>
                        <x-table.td class="border-0">0.80</x-table.td>
                        <x-table.td class="border-0">0.80</x-table.td>
                        <x-table.td class="border-0">0.20</x-table.td>
                        <x-table.td class="border-0">1.00</x-table.td>
                        {{-- 
                        <x-table.td class="font-bold">{{$item->quantity}}</x-table.td>
                        <x-table.td class="border-0">{{trans('motorspecs.transaction.description.' . $item->description)}}</x-table.td>
                        <x-table.td class="border-0">{{formatAsGbp($item->cost_per_unit)}}</x-table.td>
                        <x-table.td class="border-0">{{formatAsGbp($item->net)}}</x-table.td>
                        <x-table.td class="border-0">{{formatAsGbp($item->vatable)}}</x-table.td>
                        <x-table.td class="border-0">{{formatAsGbp($item->gross)}}</x-table.td> 
                        --}}                                                         
                    </x-table.tr>
                {{-- @endforeach --}}
            </x-table.body>
            <x-table.foot class="bg-mcgray-100">
                <x-table.tr>
                    <x-table.td colspan="3" class="border-0"></x-table.td>
                    <x-table.td class="border-0">0.80 {{-- {{formatAsGbp($invoice->net)}} --}}</x-table.td>
                    <x-table.td class="border-0">0.20 {{-- {{formatAsGbp($invoice->vatable)}} --}}</x-table.td>
                    <x-table.td class="border-0">1.00 {{-- {{formatAsGbp($invoice->gross)}} --}}</x-table.td>
                </x-table.tr>            
            </x-table.foot>
        </x-table.table>
    </div>

    <div>
        <x-table.table class="shadow-none border-t-0">
            <x-table.body>
                <x-table.tr>
                    <x-table.td class="border-0 px-3.5 py-2.5">Total (ex. VAT)</x-table.td>
                    <x-table.td class="border-0 font-bold text-right">0.80 {{-- {{formatAsGbp($invoice->net)}} --}}</x-table.td>
                </x-table.tr>
                <x-table.tr>
                    <x-table.td class="border-0">VAT @ {{config('settings.vat_rate')}}%</x-table.td>
                    <x-table.td class="border-0 font-bold text-right">0.20 {{-- {formatAsGbp($invoice->vatable)}} --}}</x-table.td>
                </x-table.tr>
                <x-table.tr>
                    <x-table.td class="border-0">Total (incl. VAT)</x-table.td>
                    <x-table.td class="border-0 font-bold text-right">1.00 {{-- {formatAsGbp($invoice->gross)}} --}}</x-table.td>
                </x-table.tr>                                                                                                    
            </x-table.body>
        </x-table.table>
    </div>

    <p class="text-center text-2xl font-bold mb-2.5">
        Total £1.00
        {{-- Total {{formatAsGbp($invoice->gross)}} --}}
    </p>

    <p class="flex justify-center mb-2.5">
        <a 
            href="#"
            class="flex items-center justify-center bg-alert-success w-full text-white border-sm hover:text-white font-bold text-base py-4 px-6 uppercase"
        >
            <span class="uppercase ml-2">Mark Paid</span>
        </a> 

    {{-- @if($invoice->isPaid)
        <p class="invoice-paid text-center">Paid</p>
        <span class="text-xl uppercase font-bold text-alert-success">
            Paid
        </span>             
    @elseif($support)
        <p class="text-center"><a class="btn btn-lg btn-success btn-block" href="{{$markPaidUrl}}">Mark Paid</a></p>
        <a 
            href="#"
            class="flex items-center justify-center bg-alert-success w-full text-white border-sm hover:text-white font-bold text-base py-4 px-6 uppercase"
        >
            <span class="uppercase ml-2">Mark Paid</span>
        </a>

    @elseif($invoice->type == 'manual_credit_invoice')
        <p class="text-center">
            The invoice can be paid by Bank Transfer, Direct Debit or Cheque.<br>
            Please contact <a class="underline text-alert-success" href="mailto:accounts@motorcheck.co.uk">accounts@motorcheck.co.uk</a> if you require assistance
        </p>
    @else
        <p class="text-center"><a class="btn btn-lg btn-success btn-block" href="{{route('app.admin.billing.payment.create')}}">Pay Now</a></p>
    @endif --}}
    </p>

    <p class="flex justify-center mb-2.5">
        <a 
            href="#"
            class="border border-alert-success hover:bg-alert-success rounded-full text-alert-success hover:text-white font-bold text-sm py-1 px-4 uppercase"
        >
            <span class="flex items-center">
                <x-icons.print-icon class="w-3 h-3" />
                <span class="uppercase ml-2">Download PDF</span>
            </span>
        </a>    
        {{-- @if($pdfPath)
            <a class="btn btn-outline-success" href="{{$invoice->downloadUrl}}" download>
                <i class="icon icon-print"></i> Download PDF
            </a>
        @else
            <button class="btn btn-outline-info disabled" disabled>
                PDF is being generated
            </button>
        @endif --}}
    </p>

    <p class="text-xs mb-2.5">
        Motor Data Ltd T/A MotorCheck<br>
        Motorcheck.co.uk<br>
        VAT Number: GB212465241<br>
        Company Number 09346806
    </p>
    <p class="text-xs">
        128 City Road<br>
        London<br>
        EC1V 2NX<br>
        United Kingdom<br>
        T: +44 (0)330 331 0150<br>
        E: <a class="underline text-alert-success" href="mailto:accounts@motorcheck.co.uk">accounts@motorcheck.co.uk</a>
    </p>
</div>
