<?php

namespace App\Http\Controllers\loanMnagement;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class GetLoanContoller extends Controller
{

    public function index(): View
    {

        $loanEligibility = User::loanEligibility()->first();
        if ($loanEligibility != null) {
            $loanEligibilityStatus = true;
        } else {
            $loanEligibilityStatus = false;
        }

        $data = [
            'title' => "List of Loan",
            'loanEligibilityStatus' => $loanEligibilityStatus
        ];


        return view("loan-management.get-loan.index")->with($data);
    }
    public function create(): View
    {

        $loanEligibility = User::loanEligibility()->first();
        $myNextLoan = User::getetNextLoanDate()->first();

        // dd($myNextLoan);


        if ($loanEligibility != null) {
            $loanEligibilityStatus = true;
        } else {
            $loanEligibilityStatus = false;
        }
        if ($myNextLoan == null) {
            $myNextLoanStatus = true;
        } else {
            $myNextLoanStatus = false;
        }



        $data = [
            'title' => "Get Loan",
            'loanEligibilityStatus' => $loanEligibilityStatus,
            'myNextLoanStatus' => $myNextLoanStatus,
            'myNextLoanDate' => $myNextLoan ? $myNextLoan->next_loan_date : "",
        ];


        return view("loan-management.get-loan.create")->with($data);
    }

    public function show($hashid): View
    {

        $loanEligibility = User::loanEligibility()->first();
        if ($loanEligibility != null) {
            $loanEligibilityStatus = true;
        } else {
            $loanEligibilityStatus = false;
        }

        $data = [
            'title' => "Loan Details",
            'loanEligibilityStatus' => $loanEligibilityStatus,
            'hashid' => $hashid,
        ];


        return view("loan-management.get-loan.show")->with($data);
    }

    public function edit($hashid): View
    {

        $loanEligibility = User::loanEligibility()->first();
        if ($loanEligibility != null) {
            $loanEligibilityStatus = true;
        } else {
            $loanEligibilityStatus = false;
        }

        $data = [
            'title' => "Edit Loan",
            'loanEligibilityStatus' => $loanEligibilityStatus,
            'hashid' => $hashid,
        ];


        return view("loan-management.get-loan.edit")->with($data);
    }
}
