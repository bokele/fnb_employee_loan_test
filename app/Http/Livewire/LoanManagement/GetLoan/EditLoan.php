<?php

namespace App\Http\Livewire\LoanManagement\GetLoan;

use App\Models\Loan;
use Livewire\Component;
use App\Models\LoanType;

class EditLoan extends Component
{
    public $loan;
    public $hashid;
    public $loanTypeList;
    public $loanDurationtypeList;
    public $principal;
    public $interestRate;
    public $loanType;
    public $loanDuration;
    public $loanDurationType;
    public $comment;


    public function mount($hashid)
    {
        $hashid = $this->hashid;
        $this->loan = Loan::where("hashid", $hashid)->firstOrFail();

        $this->loanTypeList = $this->getLoanType();
        $this->loanDurationtypeList = $this->GetLoanDurationtype();

        $this->principal = $this->loan->principal;
        $this->loanType = $this->loan->loan_type_id;
        $this->interestRate = $this->loan->interest_rate;
        $this->loanDuration = $this->loan->loan_duration;
        $this->loanDurationType = $this->loan->loan_duration_type;
        $this->comment = $this->loan->description;
    }

    public function render()
    {
        return view('livewire.loan-management.get-loan.edit-loan');
    }

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'principal',
            'interestRate',
            'loanType',
            'loanDuration',
            'loanDurationType',
            'comment',
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
            'principal' => ['required', 'numeric'],
            'loanType' => ['required'],
            'loanDuration' => ['required', 'numeric'],
            'loanDurationType' => ['required'],
            'comment' => ['required'],
        ];
    }

    protected function getLoanType()
    {
        return LoanType::pluck('type', 'id');
    }
    protected function GetLoanDurationtype()
    {
        return [
            'month' => "Month",
            'year' => "Year",
        ];
    }
    public function changeLoanType()
    {

        $loan_type = LoanType::where('id', $this->loanType)->firstOrFail();
        $this->interestRate = $loan_type->rate;
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
        $loan = Loan::where("hashid", $hashid)->firstOrFail();
        if (auth()->id() != $loan->created_by) {
            session()->flash('danger', 'You can not Edit this Loan');
            return redirect()->route('loan-management.get-loans.create');
        }

        $loan_type = LoanType::where('id', $this->loanType)->firstOrFail();
        $loan_interest = (floatval($this->principal) *  floatval($loan_type->rate)) / 100;
        $loan_total_amount = $loan_interest +  floatval($this->principal);



        $loanUpdated = $loan->update([
            "loan_type_id" => $this->loanType,
            "principal" => $this->principal,
            "interest_rate" => $loan_type->rate,
            "loan_interest" =>  $loan_interest,
            'loan_total_amount' => $loan_total_amount,
            'interest_period' => $loan_total_amount,
            'loan_duration' => $this->loanDuration,
            'loan_duration_type' => $this->loanDurationType,
            'description' => $this->comment,
        ]);


        if ($loanUpdated != null) {
            $this->resetFilters();
            session()->flash('success', 'Loan has been updated.');
            return redirect()->route('loan-management.get-loans.show', $loan->hashid);
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('loan-management.get-loans.create');
        }
    }
}
