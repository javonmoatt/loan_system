<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
           <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full bg-blue-500 p-6 rounded-lg">
                        <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
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
