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
                        <a href="{{ route('loans.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Loan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $loan->id }}: {{ $loan->customer->firstname }} {{ $loan->customer->lastname }}</span>
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
                                <h2 class="text-2xl font-bold">Loan Details</h2>
                                <div class="flex space-x-4">
                                    <a href="{{ route('loans.edit', $loan->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Edit Loan
                                    </a>
                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this loan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                            Delete Loan
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Loan Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Loan Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Loan Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Loan ID</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->id }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Loan Amount</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($loan->loan_amount, 2) }} {{ strtoupper($loan->currency) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Interest Rate</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->interest_rate }}%</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Penalty Rate</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->penalty_rate ?? 'N/A' }}%</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Number of Installments</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->number_of_installments ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Repayment Frequency</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst($loan->repayment_frequency) ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Term</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->term }} months</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Purpose</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->purpose ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Interest Calculation Method</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst(str_replace('_', ' ', $loan->interest_calculation_method)) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Status</label>
                                            <p class="mt-1 text-gray-900">
                                                <span class="px-2 py-1 text-sm rounded-full
                                                    @if($loan->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($loan->status === 'approved') bg-green-100 text-green-800
                                                    @elseif($loan->status === 'rejected') bg-red-100 text-red-800
                                                    @elseif($loan->status === 'disbursed') bg-blue-100 text-blue-800
                                                    @elseif($loan->status === 'completed') bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ ucfirst($loan->status) }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Customer Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Customer Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Customer Name</label>
                                            <p class="mt-1 text-gray-900">
                                                <a href="{{ route('customers.show', $loan->customer_id) }}" class="text-blue-500 hover:text-blue-700">
                                                    {{ $loan->customer->firstname }} {{ $loan->customer->lastname }}
                                                </a>
                                            </p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Email</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->customer->email ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->customer->phone ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Address</label>
                                            <p class="mt-1 text-gray-900">{{ $loan->customer->address ?? 'N/A' }}</p>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('loans.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Loans
                                </a>
                            </div>
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
                        <a href="{{ route('loans.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Loans</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Loan Details</span>
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
                                <h2 class="text-2xl font-bold mb-6">Loan Details</h2>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <!-- Tabs Navigation and Content Wrapper -->
                            <div x-data="{ activeTab: 'loanInfo' }">
                                <!-- Tabs Navigation -->
                                <ul class="flex space-x-4 border-b border-gray-200">
                                    <li @click="activeTab = 'loanInfo'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'loanInfo' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Loan Information
                                    </li>
                                    <li @click="activeTab = 'customerInfo'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'customerInfo' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Customer Information
                                    </li>
                                    <li @click="activeTab = 'repaymentSchedule'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'repaymentSchedule' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Repayment Schedule
                                    </li>
                                </ul>

                                <!-- Tabs Content -->
                                <div class="mt-6">
                                    <!-- Loan Information Tab -->
                                    <div x-show="activeTab === 'loanInfo'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Loan Information</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <p class="text-sm text-gray-600">Loan ID</p>
                                                <p class="text-lg font-semibold text-gray-800">#{{ $loan->id }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Loan Amount</p>
                                                <p class="text-lg font-semibold text-gray-800">${{ number_format($loan->loan_amount,2) }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Interest Rate</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->interest_rate }}%</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Loan Term</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->term }} Months</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Disbursement Date</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->activation_date }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Status</p>
                                                <p class="text-lg font-semibold text-green-800">
                                                    <span class="px-2 py-1 text-sm rounded-full
                                                        @if($loan->status === 'pending') bg-yellow-100 text-yellow-800
                                                        @elseif($loan->status === 'approved') bg-green-100 text-green-800
                                                        @elseif($loan->status === 'rejected') bg-red-100 text-red-800
                                                        @elseif($loan->status === 'disbursed') bg-blue-100 text-blue-800
                                                        @elseif($loan->status === 'completed') bg-gray-100 text-gray-800
                                                        @endif">
                                                        {{ ucfirst($loan->status) }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Customer Information Tab -->
                                    <div x-show="activeTab === 'customerInfo'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Customer Information</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <p class="text-sm text-gray-600">Customer Name</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->customer->firstname }} {{ $loan->customer->lastname }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Email</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->customer->email }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Phone Number</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->customer->phone }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Address</p>
                                                <p class="text-lg font-semibold text-gray-800">{{ $loan->customer->address }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Repayment Schedule Tab -->
                                    <div x-show="activeTab === 'repaymentSchedule'" class="space-y-6">
                                        <div class="flex justify-between">
                                            <h2 class="text-xl font-semibold text-gray-800">Repayment Schedule</h2>
                                            <a href="#" class="text-blue-500 hover:text-blue-700">Regenerate Schedule</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full bg-white">
                                                <thead>
                                                    <tr>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Due Date</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Amount Due</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Principal Amount</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Interest Amount</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($loan->schedules as $schedule)
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">{{ $schedule->due_date }}</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">${{ number_format($schedule->amount_due, 2 ?? "N/A") }}</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">${{ number_format($schedule->principal_amount, 2 ?? "N/A") }}</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">${{ number_format($schedule->interest_amount, 2 ?? "N/A") }}</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm rounded-full
                                                                @if($schedule->status === 'pending') bg-yellow-100 text-yellow-800
                                                                @elseif($schedule->status === 'paid') bg-green-100 text-green-800
                                                                @elseif($schedule->status === 'overdue') bg-red-100 text-red-800
                                                                @endif">
                                                                {{ ucfirst($schedule->status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">2023-12-01</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">$4,500</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
