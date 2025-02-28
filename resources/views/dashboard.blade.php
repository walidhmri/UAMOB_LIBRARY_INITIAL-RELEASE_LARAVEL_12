<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Books List</h3>
                        <a href="{{ route('books.store') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Book
                        </a>
                    </div>

                    @if($books->count() > 0)
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-700 text-white">
                                    <th class="px-6 py-3 border border-gray-200 text-left">Title</th>
                                    <th class="px-6 py-3 border border-gray-200 text-left">Author</th>
                                    <th class="px-6 py-3 border border-gray-200 text-left">Year</th>
                                    <th class="px-6 py-3 border border-gray-200 text-left">Category</th>
                                    <th class="px-6 py-3 border border-gray-200 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr class="bg-black-50 hover:bg-black-100 transition">
                                        <td class="px-6 py-4 border border-black-200">{{ $book->book_name }}</td>
                                        <td class="px-6 py-4 border border-gray-200">{{ $book->Author }}</td>
                                        <td class="px-6 py-4 border border-gray-200">{{ $book->year }}</td>
                                        <td class="px-6 py-4 border border-gray-200">{{ $book->category }}</td>
                                        <td class="px-6 py-4 border border-gray-200 flex gap-2">
                                            <a href="{{ route('books.index', $book->id) }}" class="text-blue-600 hover:underline">View</a>
                                            <a href="" class="text-yellow-600 hover:underline">Edit</a>
                                            <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
                                                
                                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-gray-500 mt-6">No books found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
