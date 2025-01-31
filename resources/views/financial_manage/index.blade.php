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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Financial Management</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Financial Management</h2>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <!-- Tabs Navigation and Content Wrapper -->
                            <div x-data="{ activeTab: 'overview' }">
                                <!-- Tabs Navigation -->
                                <ul class="flex space-x-4 border-b border-gray-200">
                                    <li @click="activeTab = 'overview'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'overview' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Overview
                                    </li>
                                    <li @click="activeTab = 'repayments'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'repayments' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Repayments
                                    </li>
                                    <li @click="activeTab = 'transactions'"
                                        :class="{ 'border-blue-500 text-blue-500': activeTab === 'transactions' }"
                                        class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent cursor-pointer">
                                        Transactions
                                    </li>
                                </ul>

                                <!-- Tabs Content -->
                                <div class="mt-6">
                                    <!-- Overview Tab -->
                                    <div x-show="activeTab === 'overview'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Financial Overview</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <!-- Total Loans -->
                                            <div class="bg-blue-50 p-6 rounded-lg">
                                                <h3 class="text-lg font-semibold text-blue-800">Total Loans</h3>
                                                <p class="text-2xl font-bold text-gray-800">$1,250,000</p>
                                                <p class="text-sm text-gray-600">Outstanding loan balance</p>
                                            </div>
                                            <!-- Total Repayments -->
                                            <div class="bg-green-50 p-6 rounded-lg">
                                                <h3 class="text-lg font-semibold text-green-800">Total Repayments</h3>
                                                <p class="text-2xl font-bold text-gray-800">$750,000</p>
                                                <p class="text-sm text-gray-600">Amount repaid to date</p>
                                            </div>
                                            <!-- Pending Repayments -->
                                            <div class="bg-yellow-50 p-6 rounded-lg">
                                                <h3 class="text-lg font-semibold text-yellow-800">Pending Repayments</h3>
                                                <p class="text-2xl font-bold text-gray-800">$50,000</p>
                                                <p class="text-sm text-gray-600">Due in the next 30 days</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Repayments Tab -->
                                    <div x-show="activeTab === 'repayments'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Repayment Schedules</h2>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full bg-white">
                                                <thead>
                                                    <tr>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Loan ID</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Due Date</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Amount Due</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">101</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">2023-11-15</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">$5,000</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">Paid</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">102</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">2023-11-20</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">$3,000</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Transactions Tab -->
                                    <div x-show="activeTab === 'transactions'" class="space-y-6">
                                        <h2 class="text-xl font-semibold text-gray-800">Transaction History</h2>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full bg-white">
                                                <thead>
                                                    <tr>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Date</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Description</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Amount</th>
                                                        <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">2023-11-01</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">Loan Disbursement</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">$10,000</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">Credit</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-6 py-4 border-b border-gray-200">2023-11-05</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">Repayment Received</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">$2,000</td>
                                                        <td class="px-6 py-4 border-b border-gray-200">
                                                            <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">Debit</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
