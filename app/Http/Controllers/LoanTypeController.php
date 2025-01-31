<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use App\Http\Requests\StoreLoanTypeRequest;
use App\Http\Requests\UpdateLoanTypeRequest;

class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanTypes = LoanType::all();
        return view('loan_types.index', compact('loanTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanTypeRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'interest_rate' => 'required|numeric',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
        ]);

        LoanType::create($validatedData);

        return redirect()->route('loan_types.index')->with('success', 'Loan type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanType $loanType)
    {
        return view('loan_types.show', compact('loanType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanType $loanType)
    {
        return view('loan_types.edit', compact('loanType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanTypeRequest $request, LoanType $loanType)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'interest_rate' => 'required|numeric',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
        ]);

        $loanType->update($validatedData);

        return redirect()->route('loan_types.index')->with('success', 'Loan type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanType $loanType)
    {
        $loanType->delete();

        return redirect()->route('loan_types.index')->with('success', 'Loan type deleted successfully.');
    }
}
