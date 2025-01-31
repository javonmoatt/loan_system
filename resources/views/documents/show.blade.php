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
                        <a href="{{ route('documents.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Documents</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $document->customer->firstname." ".$document->customer->lastname }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Show Document</h2>
                            </div>
                            <div>
                                <a href="{{ route('documents.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Documents
                                </a>
                            </div>
                        </div>

                        <!-- Form for Editing a Document -->
                        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{ documentFor: '{{ $document->loan_id ? 'loan' : 'customer' }}' }">
                            @csrf
                            @method('PUT')

                            <!-- Document For Field -->
                            <div>
                                <label for="document_for" class="block text-sm font-medium text-gray-700">Document For</label>
                                <select name="document_for" id="document_for" x-model="documentFor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                    <option value="customer">Customer</option>
                                    <option value="loan">Loan</option>
                                </select>
                            </div>

                            <!-- Customer ID Field -->
                            <div x-show="documentFor === 'customer'">
                                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                                <select name="customer_id" id="customer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="">Select a Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $document->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->firstname }} {{ $customer->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Loan ID Field -->
                            <div x-show="documentFor === 'loan'">
                                <label for="loan_id" class="block text-sm font-medium text-gray-700">Loan</label>
                                <select name="loan_id" id="loan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="">Select a Loan</option>
                                    @foreach ($loans as $loan)
                                        <option value="{{ $loan->id }}" {{ $document->loan_id == $loan->id ? 'selected' : '' }}>
                                            Loan #{{ $loan->id }} ({{ $loan->customer->name }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('loan_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Document Type Field -->
                            <div>
                                <label for="document_type" class="block text-sm font-medium text-gray-700">Document Type</label>
                                <select name="document_type" id="document_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                    <option value="">Select a Document Type</option>
                                    <option value="ID" {{ $document->document_type == 'ID' ? 'selected' : '' }}>ID</option>
                                    <option value="Proof of Income" {{ $document->document_type == 'Proof of Income' ? 'selected' : '' }}>Proof of Income</option>
                                    <option value="Bank Statement" {{ $document->document_type == 'Bank Statement' ? 'selected' : '' }}>Bank Statement</option>
                                    <option value="Contract" {{ $document->document_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                                @error('document_type')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- File Upload Field -->
                            <div>
                                <label for="file" class="block text-sm font-medium text-gray-700">Upload File</label>
                                <input type="file" name="file" id="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:border-blue-500" accept=".pdf,.doc,.docx,.jpg,.png">
                                @error('file')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <!-- Display current file if exists -->
                                @if ($document->file_path)
                                    <div class="mt-2">
                                        <span class="text-sm text-gray-600">Current File: </span>
                                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                                            {{ basename($document->file_path) }}
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Update Document
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
