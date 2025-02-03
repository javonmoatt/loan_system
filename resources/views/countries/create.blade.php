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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
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
                        <h2 class="text-2xl font-bold mb-6">Add New Country</h2>

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Whoops!</strong>
                                <span class="block sm:inline">There were some problems with your input.</span>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Create Country Form -->
                        <form action="{{ route('countries.store') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required>
                                </div>

                                <!-- Code -->
                                <div>
                                    <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Code</label>
                                    <input type="text" name="code" id="code" value="{{ old('code') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required maxlength="2">
                                </div>

                                <!-- Phone Code -->
                                <div>
                                    <label for="phone_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Code</label>
                                    <input type="text" name="phone_code" id="phone_code" value="{{ old('phone_code') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required maxlength="5">
                                </div>

                                <!-- Currency -->
                                <div>
                                    <label for="currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency</label>
                                    <input type="text" name="currency" id="currency" value="{{ old('currency') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required maxlength="50">
                                </div>

                                <!-- Currency Symbol -->
                                <div>
                                    <label for="currency_symbol" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency Symbol</label>
                                    <input type="text" name="currency_symbol" id="currency_symbol" value="{{ old('currency_symbol') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           required maxlength="5">
                                </div>

                                <!-- Region -->
                                <div>
                                    <label for="region" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Region</label>
                                    <input type="text" name="region" id="region" value="{{ old('region') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           maxlength="50">
                                </div>

                                <!-- Subregion -->
                                <div>
                                    <label for="subregion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subregion</label>
                                    <input type="text" name="subregion" id="subregion" value="{{ old('subregion') }}"
                                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           maxlength="50">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit"
                                        class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create Country
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
