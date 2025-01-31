<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loan Collateral Details') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full bg-blue-500 p-6 rounded-lg">
                        <!-- Collateral Details -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="space-y-4">
                                <!-- Loan ID -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Loan ID</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $loanCollateral->loan_id }}</p>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $loanCollateral->description }}</p>
                                </div>

                                <!-- Value -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Value</label>
                                    <p class="mt-1 text-lg text-gray-900">${{ number_format($loanCollateral->value, 2) }}</p>
                                </div>

                                <!-- Created At -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Created At</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $loanCollateral->created_at->format('M d, Y H:i A') }}</p>
                                </div>

                                <!-- Updated At -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Updated At</label>
                                    <p class="mt-1 text-lg text-gray-900">{{ $loanCollateral->updated_at->format('M d, Y H:i A') }}</p>
                                </div>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('loan-collaterals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
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
