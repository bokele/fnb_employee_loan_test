<?php

namespace App\Http\Livewire\Settings\LoanType;

use Livewire\Component;
use App\Models\LoanType;

class EditLoanTypeLivewire extends Component
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
     * @var string
     */
    public $hashid = '';

    /**
     * @var string
     */
    public $loanTypeToUpdate;

    public function mount($hashid)
    {
        $this->loanTypeToUpdate = LoanType::where("hashid", $hashid)->firstOrFail();
        $this->loanType = $this->loanTypeToUpdate->loan_type;
        $this->rate  = $this->loanTypeToUpdate->rate;
    }

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
        $hashid = $this->hashid;

        $loanType = LoanType::whereHashid($hashid)->firstOrFail();
        $loanTypeUpdated =  $loanType->update([
            'type' => $this->loanType,
            'rate' => $this->rate,
        ]);

        if ($loanTypeUpdated != null) {
            $this->resetFilters();
            session()->flash('success', 'Laon Type has been Update.');
            return redirect()->route('admin.settings.loan-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.loan-types.create');
        }
    }
    public function render()
    {
        return view('livewire.settings.loan-type.edit-loan-type-livewire');
    }

    public function delete()
    {
        $hashid = $this->hashid;
        $loanType = LoanType::whereHashid($hashid)->firstOrFail();
        $loanType->delete();

        if ($loanType != null) {
            $this->resetFilters();
            session()->flash('success', 'Laon Type has been deletd.');
            return redirect()->route('admin.settings.loan-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.loan-types.edit',  $hashid);
        }
    }
}
