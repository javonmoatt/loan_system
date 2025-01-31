<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Loan;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all payments with their associated loans and paginate the results
        $payments = Payment::with('loan')->paginate(10);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all loans to populate the dropdown
        $loans = Loan::all();
        return view('payments.create', compact('loans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_due' => 'required|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'due_date' => 'required|date',
            'paid_date' => 'nullable|date',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        // Create the payment
        Payment::create($validatedData);

        // Redirect to the payments index page with a success message
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        // Load the associated loan
        $payment->load('loan');
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        // Fetch all loans to populate the dropdown
        $loans = Loan::all();
        return view('payments.edit', compact('payment', 'loans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        // Validate the request
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_due' => 'required|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'due_date' => 'required|date',
            'paid_date' => 'nullable|date',
            'status' => 'required|in:pending,paid,overdue',
        ]);

        // Update the payment
        $payment->update($validatedData);

        // Redirect to the payments index page with a success message
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        // Delete the payment
        $payment->delete();

        // Redirect to the payments index page with a success message
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
