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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Reports</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Loan Applications</h2>
                            </div>
                            <div>
                                <!-- Add New Application Button -->
                                <a href="{{ route('applications.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
                                    Add New Application
                                </a>
                            </div>
                        </div>
                        <div x-data="{ activeTab: 'loans' }" class="bg-white rounded-lg shadow-lg p-6">
                            <!-- Tabs Navigation -->
                            <div class="flex space-x-4 border-b border-gray-200">
                                <button
                                    @click="activeTab = 'loans'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'loans' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Loans Report
                                </button>
                                <button
                                    @click="activeTab = 'customers'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'customers' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Customers Report
                                </button>
                                <button
                                    @click="activeTab = 'payments'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'payments' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Payments Report
                                </button>
                            </div>

                            <!-- Tabs Content -->
                            <div class="mt-6">
                                <!-- Loans Report -->
                                <div x-show="activeTab === 'loans'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Loans Report</h2>
                                    <p class="text-gray-600">View and analyze loan-related data.</p>
                                    <a href="{{ route('reports.loans') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                        View Loans Report
                                    </a>
                                </div>

                                <!-- Customers Report -->
                                <div x-show="activeTab === 'customers'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Customers Report</h2>
                                    <p class="text-gray-600">View and analyze customer-related data.</p>
                                    <a href="{{ route('reports.customers') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                        View Customers Report
                                    </a>
                                </div>

                                <!-- Payments Report -->
                                <div x-show="activeTab === 'payments'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Payments Report</h2>
                                    <p class="text-gray-600">View and analyze payment-related data.</p>
                                    <a href="{{ route('reports.payments') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                        View Payments Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
