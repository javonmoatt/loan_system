<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approvals') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
           <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Approvals</h2>
                            </div>
                            <!-- Success Message Section -->
                            @if (session('success'))
                            <div class="flex items-center w-full max-w-xs text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800"
                                x-data="{ show: true }"
                                x-init="setTimeout(() => show = false, 1000)"
                                x-show="show"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class=""
                                role="alert">
                                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <span class="ms-3 text-sm font-norma">{{ session('success') }}</span>
                            </div>
                            @endif
                            <div>
                                <!-- Add New Approval Button -->
                                <a href="{{ route('approvals.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
                                    Add New Approval
                                </a>
                            </div>
                        </div>
                        <!-- Check if there are approvals -->
                        @if ($approvals->isEmpty())
                            <!-- No Approvals Message -->
                            <div class="bg-gray-100 p-6 rounded-lg text-center text-gray-600">
                                <p>No approvals found. Click the button above to add a new approval.</p>
                            </div>
                        @else
                            <!-- Approvals Table -->
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">Requested By</th>
                                        <th class="py-2 px-4 border-b">Status</th>
                                        <th class="py-2 px-4 border-b">Date Requested</th>
                                        <th class="py-2 px-4 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvals as $approval)
                                        <tr>
                                            <!-- Approval ID -->
                                            <td class="py-2 px-4 border-b">{{ $approval->id }}</td>

                                            <!-- Requested By -->
                                            <td class="py-2 px-4 border-b">{{ $approval->requested_by }}</td>

                                            <!-- Approval Status -->
                                            <td class="py-2 px-4 border-b">
                                                <span class="px-2 py-1 text-sm rounded-full
                                                    {{ $approval->status === 'approved' ? 'bg-green-200 text-green-800' :
                                                       ($approval->status === 'rejected' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                                    {{ ucfirst($approval->status) }}
                                                </span>
                                            </td>

                                            <!-- Date Requested -->
                                            <td class="py-2 px-4 border-b">{{ $approval->created_at->format('Y-m-d H:i') }}</td>

                                            <!-- Actions -->
                                            <td class="py-2 px-4 border-b">
                                                <!-- View Button -->
                                                <a href="{{ route('approvals.show', $approval->id) }}" class="text-blue-500 hover:text-blue-700">
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z" />
                                                    </svg>
                                                </a>

                                                <!-- Edit Button -->
                                                <a href="{{ route('approvals.edit', $approval->id) }}" class="text-green-500 hover:text-green-700 ml-2">
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('approvals.destroy', $approval->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="mt-6">
                                {{ $approvals->links() }}
                            </div>
                        @endif
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
