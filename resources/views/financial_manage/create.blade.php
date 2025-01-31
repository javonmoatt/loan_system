<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('applications.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Applications</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create New Application</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Create New Application</h2>
                            </div>
                            <div>
                                <a href="{{ route('applications.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Applications
                                </a>
                            </div>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('applications.store') }}" method="POST">
                            @csrf
                            <!-- Customer Details Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Customer Details</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- First Name -->
                                    <div>
                                        <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" name="firstname" id="firstname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Last Name -->
                                    <div>
                                        <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- TRN -->
                                    <div>
                                        <label for="trn" class="block text-sm font-medium text-gray-700">Tax Registration Number (TRN)</label>
                                        <input type="text" name="trn" id="trn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Address -->
                                    <div class="col-span-2">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        <textarea name="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div>
                                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Marital Status -->
                                    <div>
                                        <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                        <select name="marital_status" id="marital_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                            <option value="widowed">Widowed</option>
                                            <option value="common_law">Common Law</option>
                                        </select>
                                    </div>

                                    <!-- Number of Dependents -->
                                    <div>
                                        <label for="number_of_dependents" class="block text-sm font-medium text-gray-700">Number of Dependents</label>
                                        <input type="number" name="number_of_dependents" id="number_of_dependents" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Employment Information Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Employment Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Current Employer -->
                                    <div>
                                        <label for="current_employer" class="block text-sm font-medium text-gray-700">Current Employer</label>
                                        <input type="text" name="current_employer" id="current_employer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Job Title -->
                                    <div>
                                        <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                                        <input type="text" name="job_title" id="job_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Employment Start Date -->
                                    <div>
                                        <label for="employment_start_date" class="block text-sm font-medium text-gray-700">Employment Start Date</label>
                                        <input type="date" name="employment_start_date" id="employment_start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Monthly Income -->
                                    <div>
                                        <label for="monthly_income" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                        <input type="number" step="0.01" name="monthly_income" id="monthly_income" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Employer Address -->
                                    <div class="col-span-2">
                                        <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer Address</label>
                                        <textarea name="employer_address" id="employer_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                    </div>

                                    <!-- Work Phone -->
                                    <div>
                                        <label for="work_phone" class="block text-sm font-medium text-gray-700">Work Phone</label>
                                        <input type="text" name="work_phone" id="work_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Self Employed -->
                                    <div>
                                        <label for="self_employed" class="block text-sm font-medium text-gray-700">Self Employed</label>
                                        <select name="self_employed" id="self_employed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Financial Information Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Financial Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Total Monthly Expenses -->
                                    <div>
                                        <label for="total_monthly_expenses" class="block text-sm font-medium text-gray-700">Total Monthly Expenses</label>
                                        <input type="number" step="0.01" name="total_monthly_expenses" id="total_monthly_expenses" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Total Monthly Debt Obligations -->
                                    <div>
                                        <label for="total_monthly_debt_obligations" class="block text-sm font-medium text-gray-700">Total Monthly Debt Obligations</label>
                                        <input type="number" step="0.01" name="total_monthly_debt_obligations" id="total_monthly_debt_obligations" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Desired Loan Amount -->
                                    <div>
                                        <label for="desired_loan_amount" class="block text-sm font-medium text-gray-700">Desired Loan Amount</label>
                                        <input type="number" step="0.01" name="desired_loan_amount" id="desired_loan_amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Loan Purpose -->
                                    <div class="col-span-2">
                                        <label for="purpose" class="block text-sm font-medium text-gray-700">Loan Purpose</label>
                                        <textarea name="purpose" id="purpose" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                    </div>

                                    <!-- Loan Term -->
                                    <div>
                                        <label for="term" class="block text-sm font-medium text-gray-700">Loan Term (Months)</label>
                                        <input type="number" name="term" id="term" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Desired Payment Frequency -->
                                    <div>
                                        <label for="desired_payment_frequency" class="block text-sm font-medium text-gray-700">Payment Frequency</label>
                                        <select name="desired_payment_frequency" id="desired_payment_frequency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="fortnightly">Fortnightly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- References Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">References</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Reference 1 Name -->
                                    <div>
                                        <label for="reference_1_name" class="block text-sm font-medium text-gray-700">Reference 1 Name</label>
                                        <input type="text" name="reference_1_name" id="reference_1_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 1 Phone -->
                                    <div>
                                        <label for="reference_1_phone" class="block text-sm font-medium text-gray-700">Reference 1 Phone</label>
                                        <input type="text" name="reference_1_phone" id="reference_1_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 2 Name -->
                                    <div>
                                        <label for="reference_2_name" class="block text-sm font-medium text-gray-700">Reference 2 Name</label>
                                        <input type="text" name="reference_2_name" id="reference_2_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 2 Phone -->
                                    <div>
                                        <label for="reference_2_phone" class="block text-sm font-medium text-gray-700">Reference 2 Phone</label>
                                        <input type="text" name="reference_2_phone" id="reference_2_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Banking Information Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Banking Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Bank Name -->
                                    <div>
                                        <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                                        <input type="text" name="bank_name" id="bank_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Bank Branch -->
                                    <div>
                                        <label for="bank_branch" class="block text-sm font-medium text-gray-700">Bank Branch</label>
                                        <input type="text" name="bank_branch" id="bank_branch" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Account Number -->
                                    <div>
                                        <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                                        <input type="text" name="account_number" id="account_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Routing Number -->
                                    <div>
                                        <label for="routing_number" class="block text-sm font-medium text-gray-700">Routing Number</label>
                                        <input type="text" name="routing_number" id="routing_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Account Type -->
                                    <div>
                                        <label for="account_type" class="block text-sm font-medium text-gray-700">Account Type</label>
                                        <select name="account_type" id="account_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="saving">Saving</option>
                                            <option value="chequing">Chequing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
