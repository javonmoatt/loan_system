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
                        <a href="{{ route('countries.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Countries</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $country->name }}</span>
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
                        <!-- Page Heading -->
                        <h2 class="text-2xl font-bold mb-6">Country Details</h2>

                        <!-- Country Details -->
                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->name }}</p>
                                </div>

                                <!-- Code -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Code</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->code }}</p>
                                </div>

                                <!-- Phone Code -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Code</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->phone_code }}</p>
                                </div>

                                <!-- Currency -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->currency }}</p>
                                </div>

                                <!-- Currency Symbol -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency Symbol</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->currency_symbol }}</p>
                                </div>

                                <!-- Region -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Region</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->region ?? 'N/A' }}</p>
                                </div>

                                <!-- Subregion -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subregion</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->subregion ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Timestamps -->
                            <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Created At -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Created At</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->created_at->format('M d, Y H:i A') }}</p>
                                    </div>

                                    <!-- Updated At -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Updated At</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $country->updated_at->format('M d, Y H:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-6">
                            <a href="{{ route('countries.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                Back to Countries
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
