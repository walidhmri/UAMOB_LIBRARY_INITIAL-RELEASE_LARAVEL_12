<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-6">
                    <h3 class="text-lg font-semibold">Books List</h3>
                    <a href="#create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Book
                    </a>
                </div>

               
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-black-50 text-left">Title</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-black-50 text-left">Author</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-black-50 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200">Books title</td>
                                <td class="px-6 py-4 border-b border-gray-200">book author here</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <a href="#edit" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form class="inline-block" action="#destroy" method="POST">
            
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="3" class="px-6 py-4 border-b border-gray-200 text-center">No books found</td>
                            </tr>
                        <div class="mt-6 text-center text-sm text-gray-500">
                            © {{ date('Y') }} All rights reserved - Oualid Hamri Pages
                        </div>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
