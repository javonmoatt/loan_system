<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
           <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full bg-blue-500 p-6 rounded-lg">
                        <h1 class="text-2xl font-bold mb-6">Edit Credit Score</h1>

                        <!-- Form -->
                        <form action="{{ route('credit-scores.update', $creditScore->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                            @csrf
                            @method('PUT')

                            <!-- Customer ID -->
                            <div class="mb-4">
                                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                                <select name="customer_id" id="customer_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $creditScore->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Credit Score -->
                            <div class="mb-4">
                                <label for="score" class="block text-sm font-medium text-gray-700">Credit Score</label>
                                <input type="number" name="score" id="score" value="{{ old('score', $creditScore->score) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="300" max="850">
                                @error('score')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Source -->
                            <div class="mb-4">
                                <label for="source" class="block text-sm font-medium text-gray-700">Source</label>
                                <input type="text" name="source" id="source" value="{{ old('source', $creditScore->source) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('source')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Update Credit Score
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
