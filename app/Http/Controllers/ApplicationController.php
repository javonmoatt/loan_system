<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Approval;
use App\Models\Customer;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Fetch all applications with pagination
       $applications = Application::paginate(10);
       return view('applications.index', compact('applications'));
    }

    public function search(StoreApplicationRequest $request)
    {
        //dd($request->all());
        // Get the search query from the request search
        $search = $request->input('search');

        // Start building the query
        $query = Application::query();

        // If a search query is provided, filter the applications
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                  ->orWhere('lastname', 'like', "%{$search}%")
                  ->orWhere('trn', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Paginate the results
        $applications = $query->paginate(10);

        // Pass the search query to the view to populate the search input
        return view('applications.search', compact('applications', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'trn' => 'nullable|string|max:9|unique:applications',
            'email' => 'nullable|email|max:100|unique:applications',
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'marital_status' => 'nullable|in:single,married,divorced,widowed,common_law',
            'number_of_dependents' => 'nullable|numeric|min:0',
            'current_employer' => 'required|string|max:200',
            'job_title' => 'required|string|max:200',
            'employment_start_date' => 'nullable|date',
            'monthly_income' => 'required|numeric|min:0',
            'employer_address' => 'nullable|string',
            'work_phone' => 'nullable|string|max:11',
            'self_employed' => 'nullable|boolean',
            'total_monthly_expenses' => 'required|numeric|min:0',
            'total_monthly_debt_obligations' => 'required|numeric|min:0',
            'desired_loan_amount' => 'required|numeric|min:0',
            'purpose' => 'nullable|string',
            'term' => 'required|integer|min:1',
            'desired_payment_frequency' => 'nullable|in:monthly,weekly,fortnightly',
            'reference_1_name' => 'nullable|string|max:100',
            'reference_1_phone' => 'nullable|string|max:11',
            'reference_2_name' => 'nullable|string|max:100',
            'reference_2_phone' => 'nullable|string|max:11',
            'bank_name' => 'nullable|string|max:100',
            'bank_branch' => 'nullable|string|max:100',
            'account_number' => 'nullable|string|max:100',
            'routing_number' => 'nullable|string|max:100',
            'account_type' => 'nullable|in:saving,chequing',
            'status' => 'nullable|in:pending,approved,rejected',
        ]);

        // Create the application
        Application::create($validatedData);

        // Redirect to the applications index page with a success message
        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        // Check if the application has an approval record
        $hasApprovalStatus = Approval::where('application_id', $application->id)->exists();

        // Return the view with the application and the approval status
        return view('applications.show', ['application' => $application,'hasApprovalStatus' => $hasApprovalStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        // Validate the request
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'trn' => 'nullable|string|max:9|unique:applications,trn,' . $application->id,
            'email' => 'nullable|email|max:100|unique:applications,email,' . $application->id,
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'marital_status' => 'nullable|in:single,married,divorced,widowed,common_law',
            'number_of_dependents' => 'nullable|numeric|min:0',
            'current_employer' => 'required|string|max:200',
            'job_title' => 'required|string|max:200',
            'employment_start_date' => 'nullable|date',
            'monthly_income' => 'required|numeric|min:0',
            'employer_address' => 'nullable|string',
            'work_phone' => 'nullable|string|max:11',
            'self_employed' => 'nullable|boolean',
            'total_monthly_expenses' => 'required|numeric|min:0',
            'total_monthly_debt_obligations' => 'required|numeric|min:0',
            'desired_loan_amount' => 'required|numeric|min:0',
            'purpose' => 'nullable|string',
            'term' => 'required|integer|min:1',
            'desired_payment_frequency' => 'nullable|in:monthly,weekly,fortnightly',
            'reference_1_name' => 'nullable|string|max:100',
            'reference_1_phone' => 'nullable|string|max:11',
            'reference_2_name' => 'nullable|string|max:100',
            'reference_2_phone' => 'nullable|string|max:11',
            'bank_name' => 'nullable|string|max:100',
            'bank_branch' => 'nullable|string|max:100',
            'account_number' => 'nullable|string|max:100',
            'routing_number' => 'nullable|string|max:100',
            'account_type' => 'nullable|in:saving,chequing',
            'status' => 'nullable|in:pending,approved,rejected',
        ]);

        // Update the application
        $application->update($validatedData);

        // Redirect to the applications index page with a success message
        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
                // Delete the application
                $application->delete();

                // Redirect to the applications index page with a success message
                return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
