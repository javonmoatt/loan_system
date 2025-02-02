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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Loan</span>
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
                        <div class="bg-white p-6 max-w-7xl mx-auto">
                            <!-- Page Header -->
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <h2 class="text-2xl font-bold">Loans</h2>
                                </div>
                                <!-- Success Message Section -->
                                @if (session('success'))
                                <div class="flex items-center w-full max-w-xs text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800"
                                    x-data="{ show: true }"
                                    x-init="setTimeout(() => show = false, 1000)"
                                    x-show="show"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class=""
                                    role="alert">
                                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        <span class="sr-only">Check icon</span>
                                    </div>

                                    <span class="ms-3 text-sm font-norma">{{ session('success') }}</span>
                                </div>
                                @endif
                                <div>
                                    <a href="{{ route('loans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Create New Loan
                                    </a>
                                </div>
                            </div>

                            <!-- Search Bar -->
                            <div class="mb-6">
                                <form action="{{ route('loans.index') }}" method="GET">
                                    <input type="text" name="search" placeholder="Search loans..." value="{{ request('search') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </form>
                            </div>

                            <!-- Loans Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Loan ID</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Customer</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Loan Amount</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Interest Rate</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Status</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($loans as $loan)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 border-b border-gray-200">{{ $loan->id }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <a href="{{ route('customers.show', $loan->customer_id) }}" class="text-blue-500 hover:text-blue-700">
                                                        {{ $loan->customer->firstname }} {{ $loan->customer->lastname }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ number_format($loan->loan_amount, 2) }} {{ strtoupper($loan->currency) }}</td>
                                                <td class="px-6 py-4 border-b border-gray-200">{{ $loan->interest_rate }}%</td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <span class="px-2 py-1 text-sm rounded-full
                                                        @if($loan->status === 'pending') bg-yellow-100 text-yellow-800
                                                        @elseif($loan->status === 'approved') bg-green-100 text-green-800
                                                        @elseif($loan->status === 'rejected') bg-red-100 text-red-800
                                                        @elseif($loan->status === 'disbursed') bg-blue-100 text-blue-800
                                                        @elseif($loan->status === 'completed') bg-gray-100 text-gray-800
                                                        @endif">
                                                        {{ ucfirst($loan->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200">
                                                    <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                                        View
                                                    </a>
                                                    <a href="{{ route('loans.edit', $loan->id) }}" class="text-green-500 hover:text-green-700 mr-2">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this loan?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-6 py-4 border-b border-gray-200 text-center text-gray-500">
                                                    No loans found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6">
                                {{ $loans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
