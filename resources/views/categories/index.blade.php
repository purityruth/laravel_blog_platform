<x-app-layout>
    <div class="container">
        <h1 class="p-6 text-gray-900 dark:text-gray-100">All Categories</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">

            
            <ul class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($categories as $category)
                    <li class="p-6 text-gray-900 dark:text-gray-100 hover:bg-indigo-600">
                        <a href="{{ route('categories.show', $category->id) }}">
                            {{ $category->name }}
                        </a> {{-- Link to the category's page --}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>