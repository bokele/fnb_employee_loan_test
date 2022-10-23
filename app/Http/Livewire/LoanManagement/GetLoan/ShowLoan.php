<?php

namespace App\Http\Livewire\LoanManagement\GetLoan;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use Livewire\Component;
use App\Models\LoanComment;

class ShowLoan extends Component
{
    public $loan;
    public $hashid;
    public $comment;

    public function mount($hashid)
    {
        $hashid = $this->hashid;
        $this->loan = Loan::with(['loanComments', 'loanType', 'user', 'verifiedBy', 'approvedBy', 'disbursedBy'])
            ->where("hashid", $hashid)->firstOrFail();
    }


    public function render()
    {
        return view('livewire.loan-management.get-loan.show-loan');
    }

    public function SubmitLoan()
    {



        $hashid = $this->hashid;
        $myNextLoan = User::getetNextLoanDate()->first();

        if ($myNextLoan != null) {
            session()->flash('danger', 'You can not submit this Form. You have a running or pending Loan');
            return redirect()->route('loan-management.get-loans.show', $hashid);
        } else {
            $hashid = $this->hashid;
            $loan = Loan::where("hashid", $hashid)->firstOrFail();
            $loanMax = auth()->user()->loan_max;

            if ($loanMax < $loan->principal) {
                session()->flash('info', 'You can not submit this Form, your principal amount must not be great than ' . $loanMax);
                return redirect()->route('loan-management.get-loans.show', $loan->hashid);
            }

            $loan->loan_status = "pending";
            $loan->update();
            session()->flash('success', 'Loan has been Subbmited.');
        }


        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }
    public function verifiedLoan()
    {
        $hashid = $this->hashid;
        $loan = Loan::where("hashid", $hashid)->firstOrFail();
        $loan->loan_status = "verified";
        $loan->verified_by = auth()->id();
        $loan->verified_at = Carbon::now();
        $loan->update();


        if ($this->comment != "") {
            $comment = new LoanComment();
            $comment->loan_id =  $loan->id;
            $comment->comment = $this->comment;
            $comment->save();
        }

        session()->flash('success', 'Loan has been verified.');
        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }
    public function approvedLoan()
    {
        $hashid = $this->hashid;
        $loan = Loan::where("hashid", $hashid)->firstOrFail();
        $loan->loan_status = "approved";
        $loan->approved_by = auth()->id();
        $loan->approved_at = Carbon::now();
        $loan->update();


        if ($this->comment != "") {
            $comment = new LoanComment();
            $comment->loan_id =  $loan->id;
            $comment->comment = $this->comment;
            $comment->save();
        }

        session()->flash('success', 'Loan has been approved.');
        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }
    public function deniedLoan()
    {
        $hashid = $this->hashid;
        $loan = Loan::where("hashid", $hashid)->firstOrFail();
        $loan->loan_status = "denied";
        $loan->verified_by = auth()->id();
        $loan->verified_at = Carbon::now();
        $loan->requested_date = date('Y-m-d');
        $loan->update();


        if ($this->comment != "") {
            $comment = new LoanComment();
            $comment->loan_id =  $loan->id;
            $comment->comment = $this->comment;
            $comment->save();
        }

        session()->flash('success', 'Loan has been denied.');
        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }
    public function disbursedLoan()
    {
        $hashid = $this->hashid;
        $loan = Loan::where("hashid", $hashid)->firstOrFail();

        $user = User::where("id", $loan->created_by)->firstOrFail();

        $next_date = date("Y-m-d", strtotime(date('Y-m-d') . " +6 months"));


        $loan->loan_status = "disbursed";
        $loan->disbursed_by = auth()->id();
        $loan->disbursed_at = Carbon::now();
        $loan->next_date =  $next_date;
        $loan->update();

        $user->next_loan_date = $next_date;
        $user->update();


        if ($this->comment != "") {
            $comment = new LoanComment();
            $comment->loan_id =  $loan->id;
            $comment->comment = $this->comment;
            $comment->save();
        }
        session()->flash('success', 'Loan has been disbursed.');
        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }

    public function PaidLoan()
    {
        $hashid = $this->hashid;
        $loan = Loan::where("hashid", $hashid)->firstOrFail();

        $user = User::where("id", $loan->created_by)->firstOrFail();

        $loan->loan_status = "paid";
        $loan->update();

        // $user->next_loan_date = null;
        // $user->update();

        if ($this->comment != "") {
            $comment = new LoanComment();
            $comment->loan_id =  $loan->id;
            $comment->comment = $this->comment;
            $comment->save();
        }



        session()->flash('success', 'Loan has been paid.');
        return redirect()->route('loan-management.get-loans.show', $loan->hashid);
    }
}
