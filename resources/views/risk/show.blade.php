{{-- <x-app-layout>
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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $application->firstname." ".$application->lastname }}</span>
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
                                <h2 class="text-2xl font-bold mb-6">Application Details</h2>
                            </div>
                            <div>
                                <a href="{{ route('applications.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Applications
                                </a>
                            </div>
                        </div>
                        <!-- Customer Details Section -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">Customer Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- First Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                                    <p class="mt-1 text-gray-900">{{ $application->firstname }}</p>
                                </div>

                                <!-- Last Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <p class="mt-1 text-gray-900">{{ $application->lastname }}</p>
                                </div>

                                <!-- TRN -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tax Registration Number (TRN)</label>
                                    <p class="mt-1 text-gray-900">{{ $application->trn ?? 'N/A' }}</p>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <p class="mt-1 text-gray-900">{{ $application->email ?? 'N/A' }}</p>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                                    <p class="mt-1 text-gray-900">{{ $application->phone ?? 'N/A' }}</p>
                                </div>

                                <!-- Address -->
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                    <p class="mt-1 text-gray-900">{{ $application->address ?? 'N/A' }}</p>
                                </div>

                                <!-- Date of Birth -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                    <p class="mt-1 text-gray-900">{{ $application->date_of_birth ?? 'N/A' }}</p>
                                </div>

                                <!-- Marital Status -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Marital Status</label>
                                    <p class="mt-1 text-gray-900">{{ ucfirst($application->marital_status) ?? 'N/A' }}</p>
                                </div>

                                <!-- Number of Dependents -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Number of Dependents</label>
                                    <p class="mt-1 text-gray-900">{{ $application->number_of_dependents ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Information Section -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">Employment Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Current Employer -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Current Employer</label>
                                    <p class="mt-1 text-gray-900">{{ $application->current_employer }}</p>
                                </div>

                                <!-- Job Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Job Title</label>
                                    <p class="mt-1 text-gray-900">{{ $application->job_title }}</p>
                                </div>

                                <!-- Employment Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Employment Start Date</label>
                                    <p class="mt-1 text-gray-900">{{ $application->employment_start_date ?? 'N/A' }}</p>
                                </div>

                                <!-- Monthly Income -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                    <p class="mt-1 text-gray-900">{{ number_format($application->monthly_income, 2) }}</p>
                                </div>

                                <!-- Employer Address -->
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Employer Address</label>
                                    <p class="mt-1 text-gray-900">{{ $application->employer_address ?? 'N/A' }}</p>
                                </div>

                                <!-- Work Phone -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Work Phone</label>
                                    <p class="mt-1 text-gray-900">{{ $application->work_phone ?? 'N/A' }}</p>
                                </div>

                                <!-- Self Employed -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Self Employed</label>
                                    <p class="mt-1 text-gray-900">{{ $application->self_employed ? 'Yes' : 'No' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Information Section -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">Financial Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Total Monthly Expenses -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Total Monthly Expenses</label>
                                    <p class="mt-1 text-gray-900">{{ number_format($application->total_monthly_expenses, 2) }}</p>
                                </div>

                                <!-- Total Monthly Debt Obligations -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Total Monthly Debt Obligations</label>
                                    <p class="mt-1 text-gray-900">{{ number_format($application->total_monthly_debt_obligations, 2) }}</p>
                                </div>

                                <!-- Desired Loan Amount -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Desired Loan Amount</label>
                                    <p class="mt-1 text-gray-900">{{ number_format($application->desired_loan_amount, 2) }}</p>
                                </div>

                                <!-- Loan Purpose -->
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Loan Purpose</label>
                                    <p class="mt-1 text-gray-900">{{ $application->purpose ?? 'N/A' }}</p>
                                </div>

                                <!-- Loan Term -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Loan Term (Months)</label>
                                    <p class="mt-1 text-gray-900">{{ $application->term }}</p>
                                </div>

                                <!-- Desired Payment Frequency -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Payment Frequency</label>
                                    <p class="mt-1 text-gray-900">{{ ucfirst($application->desired_payment_frequency) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- References Section -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">References</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Reference 1 Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Reference 1 Name</label>
                                    <p class="mt-1 text-gray-900">{{ $application->reference_1_name ?? 'N/A' }}</p>
                                </div>

                                <!-- Reference 1 Phone -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Reference 1 Phone</label>
                                    <p class="mt-1 text-gray-900">{{ $application->reference_1_phone ?? 'N/A' }}</p>
                                </div>

                                <!-- Reference 2 Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Reference 2 Name</label>
                                    <p class="mt-1 text-gray-900">{{ $application->reference_2_name ?? 'N/A' }}</p>
                                </div>

                                <!-- Reference 2 Phone -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Reference 2 Phone</label>
                                    <p class="mt-1 text-gray-900">{{ $application->reference_2_phone ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Banking Information Section -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">Banking Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Bank Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bank Name</label>
                                    <p class="mt-1 text-gray-900">{{ $application->bank_name ?? 'N/A' }}</p>
                                </div>

                                <!-- Bank Branch -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bank Branch</label>
                                    <p class="mt-1 text-gray-900">{{ $application->bank_branch ?? 'N/A' }}</p>
                                </div>

                                <!-- Account Number -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Account Number</label>
                                    <p class="mt-1 text-gray-900">{{ $application->account_number ?? 'N/A' }}</p>
                                </div>

                                <!-- Routing Number -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Routing Number</label>
                                    <p class="mt-1 text-gray-900">{{ $application->routing_number ?? 'N/A' }}</p>
                                </div>

                                <!-- Account Type -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Account Type</label>
                                    <p class="mt-1 text-gray-900">{{ ucfirst($application->account_type) ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button and Create Approval Button -->
                        <div class="flex justify-end space-x-4">
                            <!-- Create Approval Button -->
                            <form action="{{ route('approvals.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="loan_id" value="{{ $application->id }}">
                                <input type="hidden" name="approver_id" value="{{ auth()->id() }}">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Approve Application
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $application->firstname." ".$application->lastname }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full" x-data="{ activeTab: 'customer' }">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Application Details</h2>
                            </div>
                            <div>
                                <a href="{{ route('applications.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Applications
                                </a>
                            </div>
                        </div>

                        <!-- Tabs Navigation -->
                        <div class="border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                <li class="me-2">
                                    <a href="#" @click.prevent="activeTab = 'customer'" :class="{ 'text-blue-600 border-blue-600': activeTab === 'customer', 'border-transparent hover:text-gray-600 hover:border-gray-300': activeTab !== 'customer' }" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                        <svg class="w-4 h-4 me-2" :class="{ 'text-blue-600': activeTab === 'customer', 'text-gray-400 group-hover:text-gray-500': activeTab !== 'customer' }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                        </svg>
                                        Customer Details
                                    </a>
                                </li>
                                <li class="me-2">
                                    <a href="#" @click.prevent="activeTab = 'employment'" :class="{ 'text-blue-600 border-blue-600': activeTab === 'employment', 'border-transparent hover:text-gray-600 hover:border-gray-300': activeTab !== 'employment' }" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                        <svg class="w-4 h-4 me-2" :class="{ 'text-blue-600': activeTab === 'employment', 'text-gray-400 group-hover:text-gray-500': activeTab !== 'employment' }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                        </svg>
                                        Employment
                                    </a>
                                </li>
                                <li class="me-2">
                                    <a href="#" @click.prevent="activeTab = 'financial'" :class="{ 'text-blue-600 border-blue-600': activeTab === 'financial', 'border-transparent hover:text-gray-600 hover:border-gray-300': activeTab !== 'financial' }" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                        <svg class="w-4 h-4 me-2" :class="{ 'text-blue-600': activeTab === 'financial', 'text-gray-400 group-hover:text-gray-500': activeTab !== 'financial' }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                                        </svg>
                                        Financial
                                    </a>
                                </li>
                                <li class="me-2">
                                    <a href="#" @click.prevent="activeTab = 'references'" :class="{ 'text-blue-600 border-blue-600': activeTab === 'references', 'border-transparent hover:text-gray-600 hover:border-gray-300': activeTab !== 'references' }" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                        <svg class="w-4 h-4 me-2" :class="{ 'text-blue-600': activeTab === 'references', 'text-gray-400 group-hover:text-gray-500': activeTab !== 'references' }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                        References
                                    </a>
                                </li>
                                <li class="me-2">
                                    <a href="#" @click.prevent="activeTab = 'banking'" :class="{ 'text-blue-600 border-blue-600': activeTab === 'banking', 'border-transparent hover:text-gray-600 hover:border-gray-300': activeTab !== 'banking' }" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                        <svg class="w-4 h-4 me-2" :class="{ 'text-blue-600': activeTab === 'banking', 'text-gray-400 group-hover:text-gray-500': activeTab !== 'banking' }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                        </svg>
                                        Banking
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Tabs Content -->
                        <div class="mt-6">
                            <!-- Customer Details Tab -->
                            <div x-show="activeTab === 'customer'">
                                <div class="mb-8 min-h-full">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">Customer Details</h3>
                                        </div>
                                        <div>
                                            <div>
                                                <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    Edit Customer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- First Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                                            <p class="mt-1 text-gray-900">{{ $application->firstname }}</p>
                                        </div>

                                        <!-- Last Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                            <p class="mt-1 text-gray-900">{{ $application->lastname }}</p>
                                        </div>

                                        <!-- TRN -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Tax Registration Number (TRN)</label>
                                            <p class="mt-1 text-gray-900">{{ $application->trn ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Email</label>
                                            <p class="mt-1 text-gray-900">{{ $application->email ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $application->phone ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Address -->
                                        <div class="col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Address</label>
                                            <p class="mt-1 text-gray-900">{{ $application->address ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Date of Birth -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                            <p class="mt-1 text-gray-900">{{ $application->date_of_birth ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Marital Status -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Marital Status</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst($application->marital_status) ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Number of Dependents -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Number of Dependents</label>
                                            <p class="mt-1 text-gray-900">{{ $application->number_of_dependents ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employment Information Tab -->
                            <div x-show="activeTab === 'employment'">
                                <div class="mb-8  min-h-full">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">Employment Information</h3>
                                        </div>
                                        <div>
                                            <div>
                                                <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    Edit Customer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Current Employer -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Current Employer</label>
                                            <p class="mt-1 text-gray-900">{{ $application->current_employer }}</p>
                                        </div>

                                        <!-- Job Title -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Job Title</label>
                                            <p class="mt-1 text-gray-900">{{ $application->job_title }}</p>
                                        </div>

                                        <!-- Employment Start Date -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Employment Start Date</label>
                                            <p class="mt-1 text-gray-900">{{ $application->employment_start_date ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Monthly Income -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($application->monthly_income, 2) }}</p>
                                        </div>

                                        <!-- Employer Address -->
                                        <div class="col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Employer Address</label>
                                            <p class="mt-1 text-gray-900">{{ $application->employer_address ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Work Phone -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Work Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $application->work_phone ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Self Employed -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Self Employed</label>
                                            <p class="mt-1 text-gray-900">{{ $application->self_employed ? 'Yes' : 'No' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Financial Information Tab -->
                            <div x-show="activeTab === 'financial'">
                                <div class="mb-8 min-h-full">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">Financial Information</h3>
                                        </div>
                                        <div>
                                            <div>
                                                <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    Edit Customer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Total Monthly Expenses -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Total Monthly Expenses</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($application->total_monthly_expenses, 2) }}</p>
                                        </div>

                                        <!-- Total Monthly Debt Obligations -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Total Monthly Debt Obligations</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($application->total_monthly_debt_obligations, 2) }}</p>
                                        </div>

                                        <!-- Desired Loan Amount -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Desired Loan Amount</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($application->desired_loan_amount, 2) }}</p>
                                        </div>

                                        <!-- Loan Purpose -->
                                        <div class="col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Loan Purpose</label>
                                            <p class="mt-1 text-gray-900">{{ $application->purpose ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Loan Term -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Loan Term (Months)</label>
                                            <p class="mt-1 text-gray-900">{{ $application->term }}</p>
                                        </div>

                                        <!-- Desired Payment Frequency -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Payment Frequency</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst($application->desired_payment_frequency) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- References Tab -->
                            <div x-show="activeTab === 'references'">
                                <div class="mb-8 min-h-full">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">References</h3>
                                        </div>
                                        <div>
                                            <div>
                                                <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    Edit Customer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Reference 1 Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Reference 1 Name</label>
                                            <p class="mt-1 text-gray-900">{{ $application->reference_1_name ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Reference 1 Phone -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Reference 1 Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $application->reference_1_phone ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Reference 2 Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Reference 2 Name</label>
                                            <p class="mt-1 text-gray-900">{{ $application->reference_2_name ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Reference 2 Phone -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Reference 2 Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $application->reference_2_phone ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Banking Information Tab -->
                            <div x-show="activeTab === 'banking'">
                                <div class="mb-8 min-h-full">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">Banking Information</h3>
                                        </div>
                                        <div>
                                            <div>
                                                <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    Edit Customer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Bank Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Bank Name</label>
                                            <p class="mt-1 text-gray-900">{{ $application->bank_name ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Bank Branch -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Bank Branch</label>
                                            <p class="mt-1 text-gray-900">{{ $application->bank_branch ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Account Number -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Account Number</label>
                                            <p class="mt-1 text-gray-900">{{ $application->account_number ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Routing Number -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Routing Number</label>
                                            <p class="mt-1 text-gray-900">{{ $application->routing_number ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Account Type -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Account Type</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst($application->account_type) ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Back Button and Create Approval Button -->
                        <div class="flex justify-end space-x-4">
                            <!-- Modal toggle -->
                                <!-- Approve Button -->
                            @if ($hasApprovalStatus)
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-gray-500 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" disabled>
                                    Approve Application
                                </button>
                            @else
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Approve Application
                                </button>
                            @endif
                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Submit Application for Approval
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5" action="{{ route('approvals.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="loan_id" value="{{ $application->id }}">
                                            <input type="hidden" name="approver_id" value="{{ auth()->id() }}">
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="comments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Approval Comment</label>
                                                    <textarea id="comments" name="comments" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add comment here"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Submit for Approval
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

