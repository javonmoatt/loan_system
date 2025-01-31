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
                        <!-- Table -->
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Customer Name</th>
                                        <th scope="col" class="px-6 py-3">Credit Score</th>
                                        <th scope="col" class="px-6 py-3">Source</th>
                                        <th scope="col" class="px-6 py-3">Created At</th>
                                        <th scope="col" class="px-6 py-3">Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($creditScores as $creditScore)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $creditScore->customer->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $creditScore->score }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $creditScore->source }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $creditScore->created_at->format('Y-m-d H:i:s') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $creditScore->updated_at->format('Y-m-d H:i:s') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                No credit scores found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
