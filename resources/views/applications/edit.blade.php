<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Application') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Edit Application</h2>
                            </div>
                            <div>
                                <a href="{{ route('applications.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Applications
                                </a>
                            </div>
                        </div>
                        <!-- Form -->
                        <form action="{{ route('applications.update', $application->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Customer Details Section -->
                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Customer Details</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- First Name -->
                                    <div>
                                        <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" name="firstname" id="firstname" value="{{ $application->firstname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Last Name -->
                                    <div>
                                        <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" value="{{ $application->lastname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- TRN -->
                                    <div>
                                        <label for="trn" class="block text-sm font-medium text-gray-700">Tax Registration Number (TRN)</label>
                                        <input type="text" name="trn" id="trn" value="{{ $application->trn }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $application->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="text" name="phone" id="phone" value="{{ $application->phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Address -->
                                    <div class="col-span-2">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        <textarea name="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $application->address }}</textarea>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div>
                                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $application->date_of_birth }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Marital Status -->
                                    <div>
                                        <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                        <select name="marital_status" id="marital_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="single" {{ $application->marital_status === 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ $application->marital_status === 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="divorced" {{ $application->marital_status === 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ $application->marital_status === 'widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="common_law" {{ $application->marital_status === 'common_law' ? 'selected' : '' }}>Common Law</option>
                                        </select>
                                    </div>

                                    <!-- Number of Dependents -->
                                    <div>
                                        <label for="number_of_dependents" class="block text-sm font-medium text-gray-700">Number of Dependents</label>
                                        <input type="number" name="number_of_dependents" id="number_of_dependents" value="{{ $application->number_of_dependents }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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
                                        <input type="text" name="current_employer" id="current_employer" value="{{ $application->current_employer }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Job Title -->
                                    <div>
                                        <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                                        <input type="text" name="job_title" id="job_title" value="{{ $application->job_title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Employment Start Date -->
                                    <div>
                                        <label for="employment_start_date" class="block text-sm font-medium text-gray-700">Employment Start Date</label>
                                        <input type="date" name="employment_start_date" id="employment_start_date" value="{{ $application->employment_start_date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Monthly Income -->
                                    <div>
                                        <label for="monthly_income" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                        <input type="number" step="0.01" name="monthly_income" id="monthly_income" value="{{ $application->monthly_income }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Employer Address -->
                                    <div class="col-span-2">
                                        <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer Address</label>
                                        <textarea name="employer_address" id="employer_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $application->employer_address }}</textarea>
                                    </div>

                                    <!-- Work Phone -->
                                    <div>
                                        <label for="work_phone" class="block text-sm font-medium text-gray-700">Work Phone</label>
                                        <input type="text" name="work_phone" id="work_phone" value="{{ $application->work_phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Self Employed -->
                                    <div>
                                        <label for="self_employed" class="block text-sm font-medium text-gray-700">Self Employed</label>
                                        <select name="self_employed" id="self_employed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="0" {{ $application->self_employed == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $application->self_employed == 1 ? 'selected' : '' }}>Yes</option>
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
                                        <input type="number" step="0.01" name="total_monthly_expenses" id="total_monthly_expenses" value="{{ $application->total_monthly_expenses }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Total Monthly Debt Obligations -->
                                    <div>
                                        <label for="total_monthly_debt_obligations" class="block text-sm font-medium text-gray-700">Total Monthly Debt Obligations</label>
                                        <input type="number" step="0.01" name="total_monthly_debt_obligations" id="total_monthly_debt_obligations" value="{{ $application->total_monthly_debt_obligations }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Desired Loan Amount -->
                                    <div>
                                        <label for="desired_loan_amount" class="block text-sm font-medium text-gray-700">Desired Loan Amount</label>
                                        <input type="number" step="0.01" name="desired_loan_amount" id="desired_loan_amount" value="{{ $application->desired_loan_amount }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Loan Purpose -->
                                    <div class="col-span-2">
                                        <label for="purpose" class="block text-sm font-medium text-gray-700">Loan Purpose</label>
                                        <textarea name="purpose" id="purpose" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $application->purpose }}</textarea>
                                    </div>

                                    <!-- Loan Term -->
                                    <div>
                                        <label for="term" class="block text-sm font-medium text-gray-700">Loan Term (Months)</label>
                                        <input type="number" name="term" id="term" value="{{ $application->term }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>

                                    <!-- Desired Payment Frequency -->
                                    <div>
                                        <label for="desired_payment_frequency" class="block text-sm font-medium text-gray-700">Payment Frequency</label>
                                        <select name="desired_payment_frequency" id="desired_payment_frequency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="monthly" {{ $application->desired_payment_frequency === 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            <option value="weekly" {{ $application->desired_payment_frequency === 'weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="fortnightly" {{ $application->desired_payment_frequency === 'fortnightly' ? 'selected' : '' }}>Fortnightly</option>
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
                                        <input type="text" name="reference_1_name" id="reference_1_name" value="{{ $application->reference_1_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 1 Phone -->
                                    <div>
                                        <label for="reference_1_phone" class="block text-sm font-medium text-gray-700">Reference 1 Phone</label>
                                        <input type="text" name="reference_1_phone" id="reference_1_phone" value="{{ $application->reference_1_phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 2 Name -->
                                    <div>
                                        <label for="reference_2_name" class="block text-sm font-medium text-gray-700">Reference 2 Name</label>
                                        <input type="text" name="reference_2_name" id="reference_2_name" value="{{ $application->reference_2_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Reference 2 Phone -->
                                    <div>
                                        <label for="reference_2_phone" class="block text-sm font-medium text-gray-700">Reference 2 Phone</label>
                                        <input type="text" name="reference_2_phone" id="reference_2_phone" value="{{ $application->reference_2_phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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
                                        <input type="text" name="bank_name" id="bank_name" value="{{ $application->bank_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Bank Branch -->
                                    <div>
                                        <label for="bank_branch" class="block text-sm font-medium text-gray-700">Bank Branch</label>
                                        <input type="text" name="bank_branch" id="bank_branch" value="{{ $application->bank_branch }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Account Number -->
                                    <div>
                                        <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                                        <input type="text" name="account_number" id="account_number" value="{{ $application->account_number }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Routing Number -->
                                    <div>
                                        <label for="routing_number" class="block text-sm font-medium text-gray-700">Routing Number</label>
                                        <input type="text" name="routing_number" id="routing_number" value="{{ $application->routing_number }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>

                                    <!-- Account Type -->
                                    <div>
                                        <label for="account_type" class="block text-sm font-medium text-gray-700">Account Type</label>
                                        <select name="account_type" id="account_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                            <option value="saving" {{ $application->account_type === 'saving' ? 'selected' : '' }}>Saving</option>
                                            <option value="chequing" {{ $application->account_type === 'chequing' ? 'selected' : '' }}>Chequing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Update Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
