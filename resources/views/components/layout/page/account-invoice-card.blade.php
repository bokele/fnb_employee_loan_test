<a href="{{route('support.account.invoice.show', ['accountHashid' => 'HASHID', 'invoiceHashid' => 'HASHID']) }}"
    class="flex items-center bg-mcgray-250 p-6 rounded-sm shadow cursor-pointer text-mc-dark group"
    >
    <div class="flex-grow min-h-[50px]">
        <div class="mb-2.5 group-hover:text-alert-success">
            <h5 class="text-lg">1221-129922</h5>
        </div>

        <div class="flex items-center text-xs text-mcgray-350 mb-2">
            <x-icons.location-icon class="w-4 h-4" />
            <span class="flex-grow ml-2">Ondricka, Hilll and Crooks Lake Elishaside</span>
        </div>

        <p class="text-xs uppercase text-alert-error">
            Due: £10
        </p>
    </div>
    <x-icons.chevron-right-icon class="w-4 h-4 text-mcgray-300 group-hover:text-alert-success" />
</a>