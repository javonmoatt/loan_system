<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanSchedule;
use App\Http\Requests\StoreLoanScheduleRequest;
use App\Http\Requests\UpdateLoanScheduleRequest;

class LoanScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanSchedule $loanSchedule)
    {
        dd($loanSchedule);
        // Fetch the loan schedule associated with the loan
        $loanSchedule = LoanSchedule::where('loan_id', $loanSchedule->id)->get();
        dd($loanSchedule);
        // Pass the loan and loan schedule to the view
        return view('loan_schedules.show', compact('loan', 'loan_schedule'));

        // $loan = Loan::findOrFail($loanSchedule->loan_id);
        // $loan_schedule = LoanSchedule::find($loanSchedule->loan_id);
        // dd($loan_schedule);
        // return view('loan_schedules.show', compact('loan','loan_schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanSchedule $loanSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanScheduleRequest $request, LoanSchedule $loanSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanSchedule $loanSchedule)
    {
        //
    }
}
