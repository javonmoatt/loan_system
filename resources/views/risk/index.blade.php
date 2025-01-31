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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Risk & Compliance</span>
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
                        <div class="flex justify-start">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Risk & Compliance</h2>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <!-- Tabs Navigation -->
                            <div class="flex space-x-4 border-b border-gray-200">
                                <button
                                    @click="activeTab = 'riskAssessment'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'riskAssessment' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Risk Assessment
                                </button>
                                <button
                                    @click="activeTab = 'complianceStatus'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'complianceStatus' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Compliance Status
                                </button>
                                <button
                                    @click="activeTab = 'auditLogs'"
                                    :class="{ 'border-blue-500 text-blue-500': activeTab === 'auditLogs' }"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-blue-500 focus:outline-none border-b-2 border-transparent"
                                >
                                    Audit Logs
                                </button>
                            </div>

                            <!-- Tabs Content -->
                            <div class="mt-6">
                                <!-- Risk Assessment -->
                                <div x-show="activeTab === 'riskAssessment'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Risk Assessment</h2>
                                    <p class="text-gray-600">View and manage risk assessments for loans and customers.</p>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Loan ID</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Risk Level</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">1</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">101</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-800 rounded-full">Medium</span>
                                                    </td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <a href="#" class="text-blue-500 hover:text-blue-700">View Details</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">2</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">102</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">Low</span>
                                                    </td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <a href="#" class="text-blue-500 hover:text-blue-700">View Details</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Compliance Status -->
                                <div x-show="activeTab === 'complianceStatus'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Compliance Status</h2>
                                    <p class="text-gray-600">Monitor compliance status for loans and customers.</p>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Loan ID</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Status</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">1</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">101</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">Compliant</span>
                                                    </td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <a href="#" class="text-blue-500 hover:text-blue-700">View Details</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">2</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">102</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <span class="px-2 py-1 text-sm bg-red-100 text-red-800 rounded-full">Non-Compliant</span>
                                                    </td>
                                                    <td class="px-6 py-4 border-b border-gray-200">
                                                        <a href="#" class="text-blue-500 hover:text-blue-700">View Details</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Audit Logs -->
                                <div x-show="activeTab === 'auditLogs'" class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800">Audit Logs</h2>
                                    <p class="text-gray-600">View audit logs for risk and compliance activities.</p>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Action</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">User</th>
                                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600">Timestamp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">1</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">Risk Assessment Updated</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">Admin</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">2023-10-01 14:30</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 border-b border-gray-200">2</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">Compliance Check</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">Auditor</td>
                                                    <td class="px-6 py-4 border-b border-gray-200">2023-10-02 10:15</td>
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
</x-app-layout>
