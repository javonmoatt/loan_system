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
                        <a href="{{ route('documents.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Documents</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="w-full">
        <div class="dark:border-gray-700">
           <div class="grid gird-col-3 w-full">
                <div class="col-span-3">
                    <div class="w-full p-6">
                        <div class="flex justify-between">
                            <div>
                                <!-- Page Heading -->
                                <h2 class="text-2xl font-bold mb-6">Documents</h2>
                            </div>
                            <div>
                                <!-- Add New Document Button -->
                                <a href="{{ route('documents.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
                                    Add New Document
                                </a>
                            </div>
                        </div>
                        <!-- Check if there are documents -->
                        @if ($documents->isEmpty())
                            <!-- No Documents Message -->
                            <div class="bg-gray-100 p-6 rounded-lg text-center text-gray-600">
                                <p>No documents found. Click the button above to add a new document.</p>
                            </div>
                        @else
                            <!-- Documents Table -->
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">Customer</th>
                                        <th class="py-2 px-4 border-b">Document Type</th>
                                        <th class="py-2 px-4 border-b">Category</th>
                                        <th class="py-2 px-4 border-b">File</th>
                                        <th class="py-2 px-4 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                        <tr>
                                            <!-- Document Title -->
                                            <td class="py-2 px-4 border-b">{{ $document->customer->firstname }} {{ $document->customer->lastname }}</td>

                                            <!-- Document Description -->
                                            <td class="py-2 px-4 border-b">{{ $document->document_type }}</td>

                                            <!-- Document Category -->
                                            <td class="py-2 px-4 border-b">{{ $document->category }}</td>

                                            <!-- Document File -->
                                            <td class="py-2 px-4 border-b">
                                                @if ($document->file_path)
                                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                                        View File
                                                    </a>
                                                @else
                                                    <span class="text-gray-500">No file uploaded</span>
                                                @endif
                                            </td>

                                            <!-- Actions -->
                                            <td class="py-2 px-4 border-b">
                                                <!-- Edit Button -->
                                                <a href="{{ route('documents.edit', $document->id) }}" class="text-green-500 hover:text-green-700 ml-2">
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="inline">
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
                                {{ $documents->links() }}
                            </div>
                        @endif
                    </div>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>
