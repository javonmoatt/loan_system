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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Applications</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
            <div class="grid grid-cols-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6 rounded-lg">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Loan Applications</h2>
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
                                role="alert"
                            >
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
                                <!-- Add New Application Button -->
                                <a href="{{ route('applications.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
                                    Add New Application
                                </a>
                            </div>
                        </div>
                        <!-- Search Bar -->
                        <div class="mb-6">
                            <form action="{{ route('applications.search') }}" method="GET">
                                <input type="text" name="search" placeholder="Search applications..." value="{{ request('search') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </form>
                        </div>
                        <!-- Check if there are applications -->
                        @if ($applications->isEmpty())
                            <!-- No Applications Message -->
                            <div class="bg-gray-100 p-6 rounded-lg text-center text-gray-600">
                                <p>No applications found. Click the button above to add a new application.</p>
                            </div>
                        @else
                            <!-- Payments Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Name</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Status</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Phone</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Email</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Desired Loan Amount</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($applications as $application)
                                        <tr class="hover:bg-gray-50 cursor-pointer" x-data="{}" @click="window.location='{{ route('applications.show', $application->id) }}'">
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $application->firstname }} {{ $application->lastname }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">
                                                <span class="px-2 py-1 text-sm rounded-full
                                                {{ $application->status === 'approved' ? 'bg-green-200 text-green-800' :
                                                   ($application->status === 'rejected' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                                {{ ucfirst($application->status) }}
                                            </td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $application->phone }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $application->email }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ number_format($application->desired_loan_amount, 2) }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">
                                                <!-- Delete Button -->
                                                <button
                                                    type="button"
                                                    class="text-red-500 hover:text-red-700 ml-2"
                                                    x-on:click.stop="$dispatch('open-modal', 'confirm-user-deletion')"
                                                >
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>

                                                <!-- Modal -->
                                                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                                    <form method="post" action="{{ route('applications.destroy', $application->id) }}" class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900">
                                                            {{ __('Are you sure you want to delete this Application?') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600">
                                                            {{ __('Once the Application is deleted, all of its resources and data will be permanently deleted.') }}
                                                        </p>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-danger-button class="ms-3">
                                                                {{ __('Delete Application') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                </x-modal>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="px-6 py-4 border-b border-gray-200 text-center text-gray-500">
                                                    No payments found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <!-- Pagination Links -->
                        <div class="mt-6">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
