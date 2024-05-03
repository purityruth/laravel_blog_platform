<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Search form -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden mt-4">
                <div class="p-6">
                    <form action="{{ route('posts.search') }}" method="GET"> {{-- Route for search --}}
                        <input
                            type="text"
                            name="q"
                            placeholder="Search posts by title or author..."
                            class="border border-gray-300 rounded p-2 w-3/4" {{-- Basic input styling --}}
                        >
                        <button type="submit" class="bg-white m-3 mt-2 border-gray-300 text-black rounded p-2 hover:bg-indigo-600">Search</button>
                    </form>
                </div>

            <!-- Display the list of blog posts -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Blog Posts</h2>
                    <br>
                    @if ($posts->isEmpty())
                        <p>No posts available.</p>
                    @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"> {{-- Responsive grid with 3 cards per row on large screens --}}
                        @foreach ($posts as $post)
                            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                                {{-- Display the featured image, if available --}}
                                @if (!empty($post->featured_image_url))
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover"> {{-- Featured image --}}
                                @endif
                                
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold">{{ $post->title }}</h3> {{-- Post title --}}
                                    
                                    {{-- Display the body or a summary of it --}}
                                    <p class="text-gray-700 dark:text-gray-200">
                                        {{ \Illuminate\Support\Str::limit($post->body, 100) }} {{-- Limit body text to 100 characters --}}
                                    </p>
                                    
                                    <div class="text-gray-500 dark:text-gray-400 mt-2"> {{-- Author and category information --}}
                                        by {{ $post->author->name }} (Category: {{ $post->category->name }})
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

