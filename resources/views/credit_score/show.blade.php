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
                        <h1 class="text-2xl font-bold mb-6">Credit Score Details</h1>

                        <!-- Details Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="space-y-4">
                                <!-- Customer Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Customer Name</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $creditScore->customer->name ?? 'N/A' }}</p>
                                </div>

                                <!-- Credit Score -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Credit Score</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $creditScore->score }}</p>
                                </div>

                                <!-- Source -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Source</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $creditScore->source }}</p>
                                </div>

                                <!-- Created At -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Created At</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $creditScore->created_at->format('Y-m-d H:i:s') }}</p>
                                </div>

                                <!-- Updated At -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Updated At</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $creditScore->updated_at->format('Y-m-d H:i:s') }}</p>
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('credit-scores.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
