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
                        <div class="bg-white p-6 rounded-lg shadow-md max-w-7xl mx-auto">
                            <!-- Page Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">Payments</h2>
                                <a href="{{ route('payments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create New Payment
                                </a>
                            </div>

                            <!-- Search Bar -->
                            <div class="mb-6">
                                <form action="{{ route('payments.index') }}" method="GET">
                                    <input type="text" name="search" placeholder="Search payments..." value="{{ request('search') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </form>
                            </div>

                            <!-- Payments Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Payment ID</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Loan ID</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Amount Due</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Amount Paid</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Due Date</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Paid Date</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Status</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $payment)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->id }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <a href="{{ route('loans.show', $payment->loan_id) }}" class="text-blue-500 hover:text-blue-700">
                                                        {{ $payment->loan_id }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ number_format($payment->amount_due, 2) }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ number_format($payment->amount_paid, 2) }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->due_date->format('Y-m-d') }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->paid_date ? $payment->paid_date->format('Y-m-d') : 'N/A' }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <span class="px-2 py-1 text-sm rounded-full
                                                        @if($payment->status === 'pending') bg-yellow-100 text-yellow-800
                                                        @elseif($payment->status === 'paid') bg-green-100 text-green-800
                                                        @elseif($payment->status === 'overdue') bg-red-100 text-red-800
                                                        @endif">
                                                        {{ ucfirst($payment->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <a href="{{ route('payments.show', $payment->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                                        View
                                                    </a>
                                                    <a href="{{ route('payments.edit', $payment->id) }}" class="text-green-500 hover:text-green-700 mr-2">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this payment?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="px-6 py-4 border-b border-gray-200 text-center text-gray-500">
                                                    No payments found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6">
                                {{ $payments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
