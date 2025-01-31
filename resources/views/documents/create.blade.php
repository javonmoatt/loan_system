<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Document') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="bdark:border-gray-700">
            <div class="grid gird-col-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Create New Document</h2>
                            </div>
                            <div>
                                <a href="{{ route('documents.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Documents
                                </a>
                            </div>
                        </div>

                        <!-- Form for Creating a New Document -->
                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{ documentFor: 'customer' }">
                            @csrf

                            <div class="grid grid-cols-2">
                                <!-- Document For Field -->
                                <div class="mr-2">
                                    <label for="document_for" class="block text-sm font-medium text-gray-700">Document For</label>
                                    <select name="document_for" id="document_for" x-model="documentFor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                        <option value="customer">Customer</option>
                                        <option value="loan">Loan</option>
                                    </select>
                                </div>
                                <!-- Customer ID Field -->
                                <div class="ml-2" x-show="documentFor === 'customer'">
                                    <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                                    <select name="customer_id" id="customer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option value="">Select a Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->firstname }} {{ $customer->lastname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Loan ID Field -->
                                <div class="ml-2" x-show="documentFor === 'loan'">
                                    <label for="loan_id" class="block text-sm font-medium text-gray-700">Loan</label>
                                    <select name="loan_id" id="loan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option value="">Select a Loan</option>
                                        @foreach ($loans as $loan)
                                            <option value="{{ $loan->id }}" {{ old('loan_id') == $loan->id ? 'selected' : '' }}>
                                                {{ $loan->customer->firstname }} {{ $loan->customer->lastname }}: {{ $loan->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('loan_id')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <!-- Document Type Field -->
                                <div class="mr-2">
                                    <label for="document_type" class="block text-sm font-medium text-gray-700">Document Type</label>
                                    <select name="document_type" id="document_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                        <option value="">Select a Document Type</option>
                                        <option value="ID" {{ old('document_type') == 'ID' ? 'selected' : '' }}>ID</option>
                                        <option value="Proof of Income" {{ old('document_type') == 'Proof of Income' ? 'selected' : '' }}>Proof of Income</option>
                                        <option value="Bank Statement" {{ old('document_type') == 'Bank Statement' ? 'selected' : '' }}>Bank Statement</option>
                                        <option value="Contract" {{ old('document_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                    </select>
                                    @error('document_type')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- File Upload Field -->
                                <div class="ml-2">
                                    <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_path" name="file_path" id="file_path" type="file" required>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                    @error('file')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-start">
                                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create Document
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
