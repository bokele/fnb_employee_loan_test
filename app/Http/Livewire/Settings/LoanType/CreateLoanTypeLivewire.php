<?php

namespace App\Http\Livewire\Settings\LoanType;

use Livewire\Component;
use App\Models\LoanType;

class CreateLoanTypeLivewire extends Component
{
    /**
     * @var string
     */
    public $loanType;
    /**
     * @var float|int
     */
    public $rate;


    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'loanType',
            'rate',
        ]);
    }


    /**
     * Valdiation rules
     *
     * @return array
     */

    protected function rules()
    {
        return [
            'loanType' => 'required|unique:loan_types,type',
            'rate' => ['required', 'numeric'],
        ];
    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        $loanType =  LoanType::create([
            'type' => $this->loanType,
            'rate' => $this->rate,
        ]);

        if ($loanType != null) {
            $this->resetFilters();
            session()->flash('success', 'Laon Type has been created.');
            return redirect()->route('admin.settings.loan-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.loan-types.create');
        }
    }

    public function render()
    {
        return view('livewire.settings.loan-type.create-loan-type-livewire');
    }
}
