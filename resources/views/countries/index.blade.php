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
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Countries</span>
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
                                <h2 class="text-2xl font-bold mb-6">Countries</h2>
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
                                <!-- Add New Country Button -->
                                <a href="{{ route('countries.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
                                    Add New Country
                                </a>
                            </div>
                        </div>
                        <!-- Search Bar -->
                        <div class="mb-6">
                            <form action="{{ route('countries.search') }}" method="GET">
                                <input type="text" name="search" placeholder="Search countries..." value="{{ request('search') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </form>
                        </div>
                        <!-- Check if there are countries -->
                        @if ($countries->isEmpty())
                            <!-- No Countries Message -->
                            <div class="bg-gray-100 p-6 rounded-lg text-center text-gray-600">
                                <p>No countries found. Click the button above to add a new country.</p>
                            </div>
                        @else
                            <!-- Countries Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Name</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Code</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Phone Code</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Currency</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Currency Symbol</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Region</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase">Subregion</th>
                                            <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500 uppercase"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($countries as $country)
                                        <tr class="hover:bg-gray-50 cursor-pointer" x-data="{}" @click="window.location='{{ route('countries.show', $country->id) }}'">
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->name }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->code }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->phone_code }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->currency }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->currency_symbol }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->region }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">{{ $country->subregion }}</td>
                                            <td class="px-6 py-4 border-b border-gray-200">
                                                <!-- Delete Button -->
                                                <button
                                                    type="button"
                                                    class="text-red-500 hover:text-red-700 ml-2"
                                                    x-on:click.stop="$dispatch('open-modal', 'confirm-country-deletion')"
                                                >
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>

                                                <!-- Modal -->
                                                <x-modal name="confirm-country-deletion" :show="$errors->countryDeletion->isNotEmpty()" focusable>
                                                    <form method="post" action="{{ route('countries.destroy', $country->id) }}" class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900">
                                                            {{ __('Are you sure you want to delete this Country?') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600">
                                                            {{ __('Once the Country is deleted, all of its resources and data will be permanently deleted.') }}
                                                        </p>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-danger-button class="ms-3">
                                                                {{ __('Delete Country') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                </x-modal>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="px-6 py-4 border-b border-gray-200 text-center text-gray-500">
                                                    No countries found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <!-- Pagination Links -->
                        <div class="mt-6">
                            {{ $countries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
