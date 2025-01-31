<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanCollateral;
use App\Http\Requests\StoreLoanCollateralRequest;
use App\Http\Requests\UpdateLoanCollateralRequest;

class LoanCollateralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanCollaterals = LoanCollateral::with('loan')->get();
        return view('loan_collaterals.index', compact('loanCollaterals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loans = Loan::all();
        return view('loan_collaterals.create', compact('loans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanCollateralRequest $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description' => 'required|string',
            'value' => 'required|numeric',
        ]);

        LoanCollateral::create($request->all());

        return redirect()->route('loan-collaterals.index')
                         ->with('success', 'Loan collateral created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanCollateral $loanCollateral)
    {
        return view('loan_collaterals.show', compact('loanCollateral'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanCollateral $loanCollateral)
    {
        $loans = Loan::all();
        return view('loan_collaterals.edit', compact('loanCollateral', 'loans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanCollateralRequest $request, LoanCollateral $loanCollateral)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description' => 'required|string',
            'value' => 'required|numeric',
        ]);

        $loanCollateral->update($request->all());

        return redirect()->route('loan-collaterals.index')
                         ->with('success', 'Loan collateral updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanCollateral $loanCollateral)
    {
        $loanCollateral->delete();

        return redirect()->route('loan-collaterals.index')
                         ->with('success', 'Loan collateral deleted successfully.');
    }
}
