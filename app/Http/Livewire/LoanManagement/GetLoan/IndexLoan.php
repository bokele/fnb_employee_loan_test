<?php

namespace App\Http\Livewire\LoanManagement\GetLoan;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLoan extends Component
{
    use WithPagination;
    public function render()
    {
        if (auth()->user()->hasRole('staff')) {
            $loans = Loan::query()->with(["user", 'loanType'])->where("created_by", auth()->id())->latest()->paginate(25);
        } else {
            $loans = Loan::query()->with(["user", 'loanType'])->latest()->paginate(25);
        }

        return view('livewire.loan-management.get-loan.index-loan', compact('loans'));
    }
}
