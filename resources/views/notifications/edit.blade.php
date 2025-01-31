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
            <div class="col-span-3 w-full">
                        <div class="bg-white p-6 max-w-2xl mx-auto">
                            <a href="{{ route('customers.index') }}" class="px-4 py-2 rounded-md hover:text-blue-500">
                                <div class="flex justify-start">
                                    <div class="my-1 mx-4">
                                        <svg class="w-6 h-6 text-gray-800 hover:text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold mb-6">Edit Customer</h2>
                                    </div>
                                </div>
                            </a>

                            <!-- Edit Customer Form -->
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2">
                                    <!-- First Name -->
                                    <div class="m-2">
                                        <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $customer->firstname) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                        @error('firstname')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Last Name -->
                                    <div class="m-2">
                                        <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $customer->lastname) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            required>
                                        @error('lastname')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="m-2" x-data="{ showTRN: false }">
                                        <label for="trn" class="block text-sm font-medium text-gray-700">Tax Registration Number (TRN)</label>
                                        <div class="relative">
                                            <input type="text" name="trn" id="trn" value="{{ old('trn', $customer->trn) }}"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                   :type="showTRN ? 'text' : 'password'">
                                            <!-- Mask/Unmask Button -->
                                            <button type="button" @click="showTRN = !showTRN" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <svg x-show="!showTRN" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z" />
                                                </svg>
                                                <svg x-show="showTRN" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>
                                            </button>
                                        </div>
                                        @error('trn')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="m-4">
                                <div class="grid grid-cols-2">
                                        <!-- Email -->
                                    <div class="m-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('email')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="m-2">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('phone')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="m-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <textarea name="address" id="address"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address', $customer->address) }}</textarea>
                                    @error('address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr class="m-4">
                                <div class="grid grid-cols-2">
                                    <!-- Date of Birth -->
                                    <div class="m-2">
                                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('date_of_birth')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Marital Status -->
                                    <div class="m-2">
                                        <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                        <select name="marital_status" id="marital_status"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="single" {{ old('marital_status', $customer->marital_status) === 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ old('marital_status', $customer->marital_status) === 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="divorced" {{ old('marital_status', $customer->marital_status) === 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ old('marital_status', $customer->marital_status) === 'widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="common_law" {{ old('marital_status', $customer->marital_status) === 'common_law' ? 'selected' : '' }}>Common Law</option>
                                        </select>
                                        @error('marital_status')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Number of Dependents -->
                                    <div class="m-2">
                                        <label for="number_of_dependents" class="block text-sm font-medium text-gray-700">Number of Dependents</label>
                                        <input type="number" name="number_of_dependents" id="number_of_dependents" value="{{ old('number_of_dependents', $customer->number_of_dependents) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('number_of_dependents')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Submit Button -->
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Update Customer
                                    </button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
