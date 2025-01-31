<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Approval') }}
        </h2>
    </x-slot>

    <div class="w-full sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <!-- Page Heading -->
                        <h2 class="text-2xl font-bold mb-6">Create New Approval</h2>

                        <!-- Approval Creation Form -->
                        <form action="{{ route('approvals.store') }}" method="POST">
                            @csrf

                            <!-- Loan Selection -->
                            <div class="mb-4">
                                <label for="loan_id" class="block text-sm font-medium text-gray-700">Loan</label>
                                <select name="loan_id" id="loan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                    <option value="">Select a Loan</option>
                                    @foreach($loans as $loan)
                                        <option value="{{ $loan->id }}">{{ $loan->id }} - {{ $loan->borrower_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approver Selection -->
                            <div class="mb-4">
                                <label for="approver_id" class="block text-sm font-medium text-gray-700">Approver</label>
                                <select name="approver_id" id="approver_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                    <option value="">Select an Approver</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approval Status -->
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                    <option value="pending" selected>Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>

                            <!-- Comments -->
                            <div class="mb-4">
                                <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                                <textarea name="comments" id="comments" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter comments (optional)"></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end mt-6">
                                <a href="{{ route('approvals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">
                                    Cancel
                                </a>
                                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Create Approval
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
