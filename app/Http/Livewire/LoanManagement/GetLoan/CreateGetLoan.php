<?php

namespace App\Http\Livewire\LoanManagement\GetLoan;

use App\Helpers\ChronoService;
use App\Models\Loan;
use App\Models\LoanType;
use Livewire\Component;

class CreateGetLoan extends Component
{

    public $loanTypeList;
    public $loanDurationtypeList;
    public $principal;
    public $interestRate;
    public $loanType;
    public $loanDuration;
    public $loanDurationType;
    public $comment;

    public function render()
    {
        return view('livewire.loan-management.get-loan.create-get-loan');
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

    /**
     * Component Mound
     *
     * @return void;
     */

    public function mount()
    {

        $this->loanTypeList = $this->getLoanType();
        $this->loanDurationtypeList = $this->GetLoanDurationtype();
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

        $code = new ChronoService();
        $loanId = $code->loan_number();
        $loan_type = LoanType::where('id', $this->loanType)->firstOrFail();
        $loan_interest = (floatval($this->principal) *  floatval($loan_type->rate)) / 100;
        $loan_total_amount = $loan_interest +  floatval($this->principal);


        $loan = Loan::create([
            "loan_type_id" => $this->loanType,
            "loan_reference_number" => $loanId,
            "loan_status" => "draft",
            "principal" => $this->principal,
            "interest_rate" => $loan_type->rate,
            "loan_interest" =>  $loan_interest,
            'loan_total_amount' => $loan_total_amount,
            'interest_period' => $loan_total_amount,
            'loan_duration' => $this->loanDuration,
            'loan_duration_type' => $this->loanDurationType,
            'description' => $this->comment,
        ]);


        if ($loan != null) {
            $this->resetFilters();
            session()->flash('success', 'Loan has been created.');
            return redirect()->route('loan-management.get-loans.show', $loan->hashid);
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('loan-management.get-loans.create');
        }
    }
}
