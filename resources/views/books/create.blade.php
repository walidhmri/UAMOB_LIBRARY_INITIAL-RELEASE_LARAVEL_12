<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- اسم الكتاب -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Book Name</label>
                <input type="text" name="book_name" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Author</label>
                <input type="text" name="Author" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>
            <!-- السنة -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Year</label>
                <input type="text" name="year" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>

            <!-- وصف الكتاب -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required></textarea>
            </div>

            <!-- التصنيف -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Category</label>
                <input type="text" name="category" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>


            <!-- الحالة -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Status</label>
                <select name="status" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>

            <!-- رفع صورة الغلاف -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Cover Image</label>
                <input type="file" name="image" accept="image/*" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>

            <!-- رفع ملف PDF -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">PDF File</label>
                <input type="file" name="pdf" accept="application/pdf" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" required>
            </div>

            <!-- زر الإضافة -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
