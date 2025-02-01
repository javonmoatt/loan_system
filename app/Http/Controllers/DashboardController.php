<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $applicationCount = Application::count();
        $loanCount = Loan::count();
        $loanTotal = Loan::sum('loan_amount');
        $paymentsTotal = Payment::sum('amount_paid');
        return view('dashboard', compact('customerCount', 'applicationCount', 'loanCount', 'loanTotal', 'paymentsTotal'));
        // Assuming you have a relationship to get the approvals for the current user
        // $approvalCount = auth()->user()->approvals()->count();

        // return view('dashboard', [
        //     'approvalCount' => $approvalCount,
        // ]);
    }
}
