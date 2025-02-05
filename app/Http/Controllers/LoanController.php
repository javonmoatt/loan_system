<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanSchedule;
use App\Services\LoanCalculator;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all loans with their associated customers and paginate the results
        $loans = Loan::with('customer')->paginate(10);
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all customers to populate the dropdown
        $customers = Customer::all();
        return view('loans.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'activation_date' => 'nullable|date',
            'loan_amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'penalty_rate' => 'nullable|numeric|min:0',
            'number_of_installments' => 'nullable|integer|min:1',
            'repayment_frequency' => 'nullable|in:monthly,weekly,fortnightly',
            'term' => 'required|integer|min:1',
            'purpose' => 'nullable|string|max:255',
            'currency' => 'nullable|in:jmd,cad,usd,kyd,eur',
            'interest_calculation_method' => 'nullable|in:fixed,declining_balance,declining_balance_equal_installment',
            'status' => 'nullable|in:pending,approved,rejected,disbursed,completed',
        ]);

        // Create the loan
        $loan = Loan::create($validatedData);

        $schedules = LoanCalculator::generateSchedule($loan);
        LoanSchedule::insert($schedules);

        // Redirect to the loans index page with a success message
        return redirect()->route('loans.index')->with('success', 'Loan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        // Load the associated customer
        //$loanSchedule = LoanSchedule::where('loan_id', $loan->id)->get();
        //dd($loanSchedule);
        $loan->load('customer','schedules');
        //dd($loan);
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        // Fetch all customers to populate the dropdown
        $customers = Customer::all();
        return view('loans.edit', compact('loan', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        // Validate the request
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'activation_date' => 'nullable|date',
            'loan_amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'penalty_rate' => 'nullable|numeric|min:0',
            'number_of_installments' => 'nullable|integer|min:1',
            'repayment_frequency' => 'nullable|in:monthly,weekly,fortnightly',
            'term' => 'required|integer|min:1',
            'purpose' => 'nullable|string|max:255',
            'currency' => 'nullable|in:jmd,cad,usd,kyd,eur',
            'interest_calculation_method' => 'nullable|in:fixed,declining_balance,declining_balance_equal_installment',
            'status' => 'nullable|in:pending,approved,rejected,disbursed,completed',
        ]);

        // Update the loan
        $loan->update($validatedData);

        // Redirect to the loans index page with a success message
        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        // Delete the loan
        $loan->delete();

        // Redirect to the loans index page with a success message
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
    }
}
