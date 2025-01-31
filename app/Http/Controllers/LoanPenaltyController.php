<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanPenalty;
use App\Http\Requests\StoreLoanPenaltyRequest;
use App\Http\Requests\UpdateLoanPenaltyRequest;

class LoanPenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Fetch the loan and its penalties
         $loan_penalties = Loan::with('loan')->paginate(10);
        //  $loan = Loan::findOrFail($loanId);
        //  $penalties = $loan->penalties;

         return view('loan_penalties.index', compact('loan_penalties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loans = Loan::all();
        return view('loan_penalties.create', compact('loans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanPenaltyRequest $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'penalty_type' => 'required',
            'amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        // Create the payment
        LoanPenalty::create($validatedData);

        // Redirect to the payments index page with a success message
        return redirect()->route('loan_penalties.index')->with('success', 'Penalty created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanPenalty $loanPenalty)
    {
        // Load the associated loan
        $loanPenalty->load('loan');
        return view('loan_penalties.show', compact('loanPenalty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanPenalty $loanPenalty)
    {
        $loans = Loan::all();
        return view('loan_panalties.edit', compact('loanPenalty', 'loans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanPenaltyRequest $request, LoanPenalty $loanPenalty)
    {
        // Validate the request
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'penalty_type' => 'required',
            'amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        // Update the payment
        $loanPenalty->update($validatedData);

        // Redirect to the payments index page with a success message
        return redirect()->route('loan_penalties.index')->with('success', 'Penalty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanPenalty $loanPenalty)
    {
        // Delete the payment
        $loanPenalty->delete();

        // Redirect to the payments index page with a success message
        return redirect()->route('loan_penalties.index')->with('success', 'Penalty deleted successfully.');
    }
}
