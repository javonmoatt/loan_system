<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanContract extends Controller
{
    public function generateContract(Loan $loan)
    {
        // Fetch loan, borrower, and repayment schedule data
        $loan = Loan::findOrFail($loan->id);
        $borrower = $loan->customer->firstname." ".$loan->customer->lastname;
        //$repaymentSchedule = $loan->loanschedule->repaymentSchedules;

        // Define terms and conditions
        $termsAndConditions = "Lorem ipsum dolor sit amet, consectetur adipiscing elit...";

        // Generate the PDF
        $pdf = Pdf::loadView('loan_contract', [
            'loan' => $loan,
            'borrower' => $borrower,
            //'repaymentSchedule' => $repaymentSchedule,
            'termsAndConditions' => $termsAndConditions,
        ]);

        // Return the PDF for download
        return $pdf->download('loan_contract.pdf');
    }
}
