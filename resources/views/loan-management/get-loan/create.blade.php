<x-app-layout :title="$title">


    @if($loanEligibilityStatus == true)
    @if($myNextLoanStatus == true)

    <livewire:loan-management.get-loan.create-get-loan />
    @else
    <div x-data="{'showAlert' : true }">
        <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-info">
            <x-icons.info-circled-icon class="w-5 h-5 mr-5" />
            <span class="flex-grow">
                Your can not to get a loan for now, please apply after this date {{$myNextLoanDate}}
            </span>
            <span x-on:click="showAlert = false" class="cursor-pointer">
                <x-icons.cancel-icon class="w-5 h-5" />
            </span>
        </div>
    </div>

    @endif

    @else
    <div x-data="{'showAlert' : true }">
        <div x-show="showAlert" class="flex items-center py-2.5 px-5 mb-5 text-white bg-alert-info">
            <x-icons.info-circled-icon class="w-5 h-5 mr-5" />
            <span class="flex-grow">
                Your are not Eligibility to get a loan, please contact HR for more infromation
            </span>
            <span x-on:click="showAlert = false" class="cursor-pointer">
                <x-icons.cancel-icon class="w-5 h-5" />
            </span>
        </div>
    </div>
    @endif
</x-app-layout>
