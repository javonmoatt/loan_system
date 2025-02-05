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
                        <a href="{{ route('loans.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Loan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $loan->id }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
           <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full">
                        <div class="bg-white p-6">
                            <!-- Page Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">Edit Loan</h2>
                                <a href="{{ route('loans.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Loans
                                </a>
                            </div>

                            <!-- Loan Edit Form -->
                            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Customer Selection -->
                                    <div>
                                        <label for="customer_id" class="block text-sm font-medium text-gray-500">Customer</label>
                                        <select name="customer_id" id="customer_id"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                required>
                                            <option value="">Select a customer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ $loan->customer_id == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->firstname }} {{ $customer->lastname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Loan Amount -->
                                    <div>
                                        <label for="loan_amount" class="block text-sm font-medium text-gray-500">Loan Amount</label>
                                        <input type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', $loan->loan_amount) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               step="0.01" required>
                                        @error('loan_amount')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Interest Rate -->
                                    <div>
                                        <label for="interest_rate" class="block text-sm font-medium text-gray-500">Interest Rate (%)</label>
                                        <input type="number" name="interest_rate" id="interest_rate" value="{{ old('interest_rate', $loan->interest_rate) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               step="0.01" required>
                                        @error('interest_rate')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Penalty Rate -->
                                    <div>
                                        <label for="penalty_rate" class="block text-sm font-medium text-gray-500">Penalty Rate (%)</label>
                                        <input type="number" name="penalty_rate" id="penalty_rate" value="{{ old('penalty_rate', $loan->penalty_rate) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               step="0.01">
                                        @error('penalty_rate')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Number of Installments -->
                                    <div>
                                        <label for="number_of_installments" class="block text-sm font-medium text-gray-500">Number of Installments</label>
                                        <input type="number" name="number_of_installments" id="number_of_installments" value="{{ old('number_of_installments', $loan->number_of_installments) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               min="1">
                                        @error('number_of_installments')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Repayment Frequency -->
                                    <div>
                                        <label for="repayment_frequency" class="block text-sm font-medium text-gray-500">Repayment Frequency</label>
                                        <select name="repayment_frequency" id="repayment_frequency"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="">Select repayment frequency</option>
                                            <option value="monthly" {{ old('repayment_frequency', $loan->repayment_frequency) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            <option value="weekly" {{ old('repayment_frequency', $loan->repayment_frequency) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="fortnightly" {{ old('repayment_frequency', $loan->repayment_frequency) == 'fortnightly' ? 'selected' : '' }}>Fortnightly</option>
                                        </select>
                                        @error('repayment_frequency')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Term -->
                                    <div>
                                        <label for="term" class="block text-sm font-medium text-gray-500">Term (Months)</label>
                                        <input type="number" name="term" id="term" value="{{ old('term', $loan->term) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               min="1" required>
                                        @error('term')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Purpose -->
                                    <div>
                                        <label for="purpose" class="block text-sm font-medium text-gray-500">Purpose</label>
                                        <textarea name="purpose" id="purpose"
                                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('purpose', $loan->purpose) }}</textarea>
                                        @error('purpose')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Currency -->
                                    <div>
                                        <label for="currency" class="block text-sm font-medium text-gray-500">Currency</label>
                                        <select name="currency" id="currency"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="jmd" {{ old('currency', $loan->currency) == 'jmd' ? 'selected' : '' }}>JMD</option>
                                            <option value="cad" {{ old('currency', $loan->currency) == 'cad' ? 'selected' : '' }}>CAD</option>
                                            <option value="usd" {{ old('currency', $loan->currency) == 'usd' ? 'selected' : '' }}>USD</option>
                                            <option value="kyd" {{ old('currency', $loan->currency) == 'kyd' ? 'selected' : '' }}>KYD</option>
                                            <option value="eur" {{ old('currency', $loan->currency) == 'eur' ? 'selected' : '' }}>EUR</option>
                                        </select>
                                        @error('currency')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Interest Calculation Method -->
                                    <div>
                                        <label for="interest_calculation_method" class="block text-sm font-medium text-gray-500">Interest Calculation Method</label>
                                        <select name="interest_calculation_method" id="interest_calculation_method"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="fixed" {{ old('interest_calculation_method', $loan->interest_calculation_method) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                            <option value="declining_balance" {{ old('interest_calculation_method', $loan->interest_calculation_method) == 'declining_balance' ? 'selected' : '' }}>Declining Balance</option>
                                            <option value="declining_balance_equal_installment" {{ old('interest_calculation_method', $loan->interest_calculation_method) == 'declining_balance_equal_installment' ? 'selected' : '' }}>Declining Balance (Equal Installment)</option>
                                        </select>
                                        @error('interest_calculation_method')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block text-sm font-medium text-gray-500">Status</label>
                                        <select name="status" id="status"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="pending" {{ old('status', $loan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ old('status', $loan->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ old('status', $loan->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="disbursed" {{ old('status', $loan->status) == 'disbursed' ? 'selected' : '' }}>Disbursed</option>
                                            <option value="completed" {{ old('status', $loan->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        @error('status')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Update Loan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
