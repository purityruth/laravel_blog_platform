<x-app-layout>
    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="bg-white p-5 m-10">Search Results for "{{ $query }}"</h1>
            <br>
            @if ($posts->isEmpty())
                <p>No posts found matching your search.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($posts as $post)
                        <div class="bg-white shadow rounded-lg overflow-hidden p-5 mt-10">
                        
                            @if (!empty($post->featured_image_url))
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover"> {{-- Featured image --}}
                            @endif
                            <h3>{{ $post->title }}</h3> {{-- Post title --}}
                            <p>{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                            <div>Category: {{ $post->category->name }}</div>
                        </div>
                    @endforeach
            @endif
        </div>
    </div>
</x-app-layout>