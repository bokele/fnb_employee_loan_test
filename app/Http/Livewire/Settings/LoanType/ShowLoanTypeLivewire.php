<?php

namespace App\Http\Livewire\Settings\LoanType;

use Livewire\Component;
use App\Models\LoanType;

class ShowLoanTypeLivewire extends Component
{
    public $loanType;

    public function mount($hashid)
    {
        $this->loanType = LoanType::where("hashid", $hashid)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.settings.loan-type.show-loan-type-livewire');
    }
}
