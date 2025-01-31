<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approval Details') }}
        </h2>
    </x-slot>

    <div class="w-full sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <!-- Page Heading -->
                        <h2 class="text-2xl font-bold mb-6">Approval Details</h2>

                        <!-- Approval Details Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <!-- Approval ID -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">ID</label>
                                <p class="mt-1 text-lg text-gray-900">{{ $approval->id }}</p>
                            </div>

                            <!-- Requested By -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Requested By</label>
                                <p class="mt-1 text-lg text-gray-900">{{ $approval->requested_by }}</p>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <p class="mt-1 text-lg">
                                    <span class="px-2 py-1 text-sm rounded-full
                                        {{ $approval->status === 'approved' ? 'bg-green-200 text-green-800' :
                                           ($approval->status === 'rejected' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                        {{ ucfirst($approval->status) }}
                                    </span>
                                </p>
                            </div>

                            <!-- Date Requested -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Date Requested</label>
                                <p class="mt-1 text-lg text-gray-900">{{ $approval->created_at->format('Y-m-d H:i') }}</p>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <p class="mt-1 text-lg text-gray-900">{{ $approval->description ?? 'No description provided.' }}</p>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center space-x-4 mt-6">
                                <!-- Back Button -->
                                <a href="{{ route('approvals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                    Back
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('approvals.edit', $approval->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('approvals.destroy', $approval->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this approval?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
