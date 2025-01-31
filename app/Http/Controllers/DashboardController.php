<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $applicationCount = Application::count();
        $loanCount = Loan::count();
        return view('dashboard', compact('customerCount', 'applicationCount', 'loanCount'));
        // Assuming you have a relationship to get the approvals for the current user
        // $approvalCount = auth()->user()->approvals()->count();

        // return view('dashboard', [
        //     'approvalCount' => $approvalCount,
        // ]);
    }
}
