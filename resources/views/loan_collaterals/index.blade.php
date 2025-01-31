<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loan Collaterals') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full bg-blue-500 p-6 rounded-lg">
                        <!-- Add New Collateral Button -->
                        <div class="mb-4">
                            <a href="{{ route('loan-collaterals.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Add New Collateral
                            </a>
                        </div>

                        <!-- Collateral Table -->
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Loan ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Value
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loanCollaterals as $collateral)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $collateral->loan_id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $collateral->description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${{ number_format($collateral->value, 2) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <!-- View Button -->
                                                <a href="{{ route('loan-collaterals.show', $collateral->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                                    View
                                                </a>
                                                <!-- Edit Button -->
                                                <a href="{{ route('loan-collaterals.edit', $collateral->id) }}" class="text-green-500 hover:text-green-700 mr-2">
                                                    Edit
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('loan-collaterals.destroy', $collateral->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this collateral?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
