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
                                <h2 class="text-2xl font-bold">Create New Payment</h2>
                                <a href="{{ route('payments.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Payments
                                </a>
                            </div>

                            <!-- Payment Creation Form -->
                            <form action="{{ route('payments.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Loan Selection -->
                                    <div>
                                        <label for="loan_id" class="block text-sm font-medium text-gray-500">Loan</label>
                                        <select name="loan_id" id="loan_id"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                required>
                                            <option value="">Select a loan</option>
                                            @foreach ($loans as $loan)
                                                <option value="{{ $loan->id }}" {{ old('loan_id') == $loan->id ? 'selected' : '' }}>
                                                    Loan #{{ $loan->id }} ({{ $loan->customer->firstname }} {{ $loan->customer->lastname }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('loan_id')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Amount Due -->
                                    <div>
                                        <label for="amount_due" class="block text-sm font-medium text-gray-500">Amount Due</label>
                                        <input type="number" name="amount_due" id="amount_due" value="{{ old('amount_due') }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               step="0.01" required>
                                        @error('amount_due')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Amount Paid -->
                                    <div>
                                        <label for="amount_paid" class="block text-sm font-medium text-gray-500">Amount Paid</label>
                                        <input type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', 0.00) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               step="0.01">
                                        @error('amount_paid')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Due Date -->
                                    <div>
                                        <label for="due_date" class="block text-sm font-medium text-gray-500">Due Date</label>
                                        <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                               required>
                                        @error('due_date')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Paid Date -->
                                    <div>
                                        <label for="paid_date" class="block text-sm font-medium text-gray-500">Paid Date</label>
                                        <input type="date" name="paid_date" id="paid_date" value="{{ old('paid_date') }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('paid_date')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block text-sm font-medium text-gray-500">Status</label>
                                        <select name="status" id="status"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="overdue" {{ old('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                        </select>
                                        @error('status')
                                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Create Payment
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
