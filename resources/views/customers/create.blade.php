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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create Customer</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
           <div class="grid gird-col-3 w-full">
                <div class="col-span-3">
                    <div class="bg-white p-6">
                        <!-- Page Header -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Create New Customer</h2>
                            <a href="{{ route('customers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                Back to Customers
                            </a>
                        </div>

                        <!-- Customer Creation Form -->
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Personal Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Personal Information</h3>
                                    <div class="space-y-4">
                                        <!-- First Name -->
                                        <div>
                                            <label for="firstname" class="block text-sm font-medium text-gray-500">First Name</label>
                                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                   required>
                                            @error('firstname')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Last Name -->
                                        <div>
                                            <label for="lastname" class="block text-sm font-medium text-gray-500">Last Name</label>
                                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                   required>
                                            @error('lastname')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- TRN -->
                                        <div>
                                            <label for="trn" class="block text-sm font-medium text-gray-500">Tax Registration Number (TRN)</label>
                                            <input type="text" name="trn" id="trn" value="{{ old('trn') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            @error('trn')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-500">Email</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            @error('email')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <label for="phone" class="block text-sm font-medium text-gray-500">Phone</label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            @error('phone')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div>
                                            <label for="address" class="block text-sm font-medium text-gray-500">Address</label>
                                            <textarea name="address" id="address"
                                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address') }}</textarea>
                                            @error('address')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Additional Information</h3>
                                    <div class="space-y-4">
                                        <!-- Date of Birth -->
                                        <div>
                                            <label for="date_of_birth" class="block text-sm font-medium text-gray-500">Date of Birth</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            @error('date_of_birth')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Marital Status -->
                                        <div>
                                            <label for="marital_status" class="block text-sm font-medium text-gray-500">Marital Status</label>
                                            <select name="marital_status" id="marital_status"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                                                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                                                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                            </select>
                                            @error('marital_status')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Number of Dependents -->
                                        <div>
                                            <label for="number_of_dependents" class="block text-sm font-medium text-gray-500">Number of Dependents</label>
                                            <input type="number" name="number_of_dependents" id="number_of_dependents" value="{{ old('number_of_dependents') }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            @error('number_of_dependents')
                                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create Customer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
