<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Fetch all customers from the database
         $customers = Customer::latest()->paginate(10);

         // Return the view with the customers data
         return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new customer
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'trn' => 'nullable|string|max:9|unique:customers',
            'email' => 'nullable|email|max:100|unique:customers',
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'marital_status' => 'nullable|in:single,married,divorced,widowed,common_law',
            'number_of_dependents' => 'nullable|numeric|min:0',
        ]);

        // Create a new customer in the database
        Customer::create($validatedData);

        // Redirect to the customers index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        // Return the view with the customer details
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        // Return the view for editing the customer
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        // Validate the request data
        $validatedData = $request->validated();

        // Update the customer in the database
        $customer->update($validatedData);

        // Redirect to the customers index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Delete the customer from the database
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
