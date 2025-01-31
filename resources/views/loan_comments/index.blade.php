<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loan Comments') }}
        </h2>
    </x-slot>

    <div class="bg-violet-500 w-fit sm:ml-64">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid w-full">
                <div class="bg-black">
                    <div class="w-full p-6 rounded-lg">
                        <!-- Add New Comment Button -->
                        <div class="mb-4">
                            <a href="{{ route('loan-comments.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Add New Comment
                            </a>
                        </div>

                        <!-- Comments Table -->
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Loan ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            User
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Comment
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loanComments as $comment)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $comment->loan_id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $comment->user->name }} <!-- Assuming the User model has a 'name' field -->
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ Str::limit($comment->comment, 50) }} <!-- Limit the comment to 50 characters -->
                                            </td>
                                            <td class="px-6 py-4">
                                                <!-- View Button -->
                                                <a href="{{ route('loan-comments.show', $comment->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                                    View
                                                </a>
                                                <!-- Edit Button -->
                                                <a href="{{ route('loan-comments.edit', $comment->id) }}" class="text-green-500 hover:text-green-700 mr-2">
                                                    Edit
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('loan-comments.destroy', $comment->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this comment?')">
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
