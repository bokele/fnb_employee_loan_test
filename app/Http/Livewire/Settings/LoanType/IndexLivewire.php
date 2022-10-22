<?php

namespace App\Http\Livewire\Settings\LoanType;

use App\Models\LoanType;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    use WithPagination;
    public function render()
    {
        $loanTypes = LoanType::query()->with("createdBy")->latest()->paginate(25);
        return view('livewire.settings.loan-type.index-livewire', compact('loanTypes'));
    }
}
