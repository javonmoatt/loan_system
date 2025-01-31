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
                        <a href="{{ route('payments.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Payments</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $payment->loan->customer->firstname }} {{$payment->loan->customer->lastname }}: {{ $payment->id }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
           <div class="grid w-full">
                <div class="">
                    <div class="w-full">
                        <div class="bg-white p-6">
                            <!-- Page Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">Payment Details</h2>
                                <div class="flex space-x-4">
                                    <a href="{{ route('payments.edit', $payment->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Edit Payment
                                    </a>
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                            Delete Payment
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Payment Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Payment Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Payment Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Payment ID</label>
                                            <p class="mt-1 text-gray-900">{{ $payment->id }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Amount Due</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($payment->amount_due, 2) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Amount Paid</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($payment->amount_paid, 2) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Due Date</label>
                                            <p class="mt-1 text-gray-900">{{ $payment->due_date->format('Y-m-d') }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Paid Date</label>
                                            <p class="mt-1 text-gray-900">{{ $payment->paid_date ? $payment->paid_date->format('Y-m-d') : 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Status</label>
                                            <p class="mt-1 text-gray-900">
                                                <span class="px-2 py-1 text-sm rounded-full
                                                    @if($payment->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($payment->status === 'paid') bg-green-100 text-green-800
                                                    @elseif($payment->status === 'overdue') bg-red-100 text-red-800
                                                    @endif">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Loan Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Loan Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Loan ID</label>
                                            <p class="mt-1 text-gray-900">
                                                <a href="{{ route('loans.show', $payment->loan_id) }}" class="text-blue-500 hover:text-blue-700">
                                                    {{ $payment->loan_id }}
                                                </a>
                                            </p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Customer Name</label>
                                            <p class="mt-1 text-gray-900">{{ $payment->loan->customer->firstname }} {{ $payment->loan->customer->lastname }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Loan Amount</label>
                                            <p class="mt-1 text-gray-900">{{ number_format($payment->loan->loan_amount, 2) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Interest Rate</label>
                                            <p class="mt-1 text-gray-900">{{ $payment->loan->interest_rate }}%</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Loan Status</label>
                                            <p class="mt-1 text-gray-900">
                                                <span class="px-2 py-1 text-sm rounded-full
                                                    @if($payment->loan->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($payment->loan->status === 'approved') bg-green-100 text-green-800
                                                    @elseif($payment->loan->status === 'rejected') bg-red-100 text-red-800
                                                    @elseif($payment->loan->status === 'disbursed') bg-blue-100 text-blue-800
                                                    @elseif($payment->loan->status === 'completed') bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ ucfirst($payment->loan->status) }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('payments.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Payments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
