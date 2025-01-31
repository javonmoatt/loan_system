<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Loan Collateral') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full bg-blue-500 p-6 rounded-lg">
                        <!-- Create Collateral Form -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <form action="{{ route('loan-collaterals.store') }}" method="POST">
                                @csrf

                                <!-- Loan ID -->
                                <div class="mb-4">
                                    <label for="loan_id" class="block text-sm font-medium text-gray-700">Loan ID</label>
                                    <select name="loan_id" id="loan_id" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                        <option value="" disabled selected>Select a Loan</option>
                                        @foreach($loans as $loan)
                                            <option value="{{ $loan->id }}">{{ $loan->id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3" required></textarea>
                                </div>

                                <!-- Value -->
                                <div class="mb-4">
                                    <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                                    <input type="number" step="0.01" name="value" id="value" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
                                        Create Collateral
                                    </button>
                                    <a href="{{ route('loan-collaterals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 ml-2">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
