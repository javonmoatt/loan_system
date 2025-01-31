{{-- <x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                        <a href="{{ route('customers.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Customer</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $customer->firstname." ".$customer->lastname }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full sm:ml-64">
        <div class="w-full border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid gird-col-3 w-full">
                <div class="col-span-3 w-full">
                    <div class="w-full p-6 rounded-lg">
                        <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
                            <!-- Customer Details Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">Customer Details</h2>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Edit Customer
                                </a>
                            </div>

                            <!-- Tabs -->
                            <div x-data="{ activeTab: 'personal' }">
                                <div class="border-b border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'personal'" :class="activeTab === 'personal' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'personal' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                                </svg>
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'loans'" :class="activeTab === 'loans' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                Loans Information
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Personal Information Tab Content -->
                                <div x-show="activeTab === 'personal'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Personal Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->firstname }} {{ $customer->lastname }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Tax Registration Number (TRN)</label>
                                            <div class="mt-1 flex items-center" x-data="{ isTRNMasked: true }">
                                                <p class="text-gray-900" x-text="isTRNMasked ? '{{ substr($customer->trn, 0, 3) . str_repeat('*', strlen($customer->trn) - 3) }}' : '{{ $customer->trn }}'"></p>
                                                <!-- Eye Icon for Toggling Visibility -->
                                                <button @click="isTRNMasked = !isTRNMasked" class="ml-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                                    <svg x-show="isTRNMasked" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    <svg x-show="!isTRNMasked" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Email</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->email }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->phone }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Address</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->address }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Date of Birth</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->date_of_birth }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Marital Status</label>
                                            <p class="mt-1 text-gray-900">{{ ucfirst($customer->marital_status) }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Number of Dependents</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->number_of_dependents }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Loans Information Tab Content -->
                                <div x-show="activeTab === 'loans'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('customers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back to Customers
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
                        <a href="{{ route('customers.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Customer</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $customer->firstname." ".$customer->lastname }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="w-full dark:border-gray-700">
            <div class="w-full">
                <div class="col-span-1 w-full">
                    <div class="w-full p-6 rounded-lg">
                        <div class="bg-white p-6 rounded-lg max-w-4xl mx-auto">
                            <!-- Customer Details Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold">Customer Details</h2>
                                <div class="flex justify-end">                                                            <!-- Back Button -->
                                    <div class="">
                                        <a href="{{ route('customers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                            Back to Customers
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Edit Customer
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabs -->
                            <div x-data="{ activeTab: 'personal' }">
                                <div class="border-b border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'personal'" :class="activeTab === 'personal' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'personal' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                                </svg>
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'loans'" :class="activeTab === 'loans' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                Loans Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'employement'" :class="activeTab === 'employment' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                Employment Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'financial'" :class="activeTab === 'financial' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                Financial Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'banking'" :class="activeTab === 'banking' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                Banking Information
                                            </a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" @click="activeTab = 'reference'" :class="activeTab === 'reference' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
                                                <svg class="w-4 h-4 me-2" :class="activeTab === 'loans' ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                                </svg>
                                                References
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Personal Information Tab Content -->
                                <div x-show="activeTab === 'personal'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Personal Information</h3>
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-2">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                                <p class="mt-1 text-gray-900">{{ $customer->firstname }} {{ $customer->lastname }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Tax Registration Number (TRN)</label>
                                                <div class="mt-1 flex items-center" x-data="{ isTRNMasked: true }">
                                                    <p class="text-gray-900" x-text="isTRNMasked ? '{{ substr($customer->trn, 0, 3) . str_repeat('*', strlen($customer->trn) - 3) }}' : '{{ $customer->trn }}'"></p>
                                                    <!-- Eye Icon for Toggling Visibility -->
                                                    <button @click="isTRNMasked = !isTRNMasked" class="ml-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                                        <svg x-show="isTRNMasked" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                        <svg x-show="!isTRNMasked" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Email</label>
                                                <p class="mt-1 text-gray-900">{{ $customer->email }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Phone</label>
                                                <p class="mt-1 text-gray-900">{{ $customer->phone }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Address</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->address }}</p>
                                        </div>
                                        <hr>
                                        <div class="grid grid-cols-2">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Date of Birth</label>
                                                <p class="mt-1 text-gray-900">{{ $customer->date_of_birth }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-500">Marital Status</label>
                                                <p class="mt-1 text-gray-900">{{ ucfirst($customer->marital_status) }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Number of Dependents</label>
                                            <p class="mt-1 text-gray-900">{{ $customer->number_of_dependents }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Loans Information Tab Content -->
                                <div x-show="activeTab === 'loans'" class="mt-6">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                        </div>
                                        <div class="">
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                Create Loan
                                            </a>
                                        </div>
                                    </div>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Employment Information Tab Content -->
                                <div x-show="activeTab === 'employment'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-4 p-4 justify-end">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Add Loan
                                        </a>
                                    </div>
                                </div>

                                <!-- Financial Information Tab Content -->
                                <div x-show="activeTab === 'financial'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-4 p-4 justify-end">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Add Loan
                                        </a>
                                    </div>
                                </div>

                                <!-- Banking Information Tab Content -->
                                <div x-show="activeTab === 'banking'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-4 p-4 justify-end">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Add Loan
                                        </a>
                                    </div>
                                </div>

                                <!-- Banking Information Tab Content -->
                                <div x-show="activeTab === 'reference'" class="mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Loans</h3>
                                    @if ($customer->loans->isEmpty())
                                        <p class="text-gray-500">No loans found for this customer.</p>
                                    @else
                                        <div class="space-y-4">
                                            @foreach ($customer->loans as $loan)
                                                <div class="bg-gray-50 p-4 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div>
                                                            <p class="font-semibold">Loan #{{ $loan->id }}</p>
                                                            <p class="text-sm text-gray-500">Amount: ${{ number_format($loan->amount, 2) }}</p>
                                                            <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ ucfirst($loan->status) }}</span></p>
                                                        </div>
                                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-500 hover:text-blue-700">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-4 p-4 justify-end">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Add Loan
                                        </a>
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
