<x-app-layout>
    <div class="container">
    <h1 class="p-6 text-gray-900 dark:text-gray-100">All Authors</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">

            
            <ul class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($authors as $author)
                    <li class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('authors.show', $author->id) }}">
                            {{ $author->name }}
                        </a> {{-- Link to the author's page --}}
                    </li>
                @endforeach
            </ul>
    </div>

</x-app-layout>