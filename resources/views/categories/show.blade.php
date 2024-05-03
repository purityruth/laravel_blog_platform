<x-app-layout>

    <div class="container">
        <h1>Posts in {{ $category->name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($category->posts as $post)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    @if (!empty($post->featured_image_url))
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover"> {{-- Featured image --}}
                    @endif
                    <h3>{{ $post->title }}</h3> {{-- Post title --}}
                    <p>{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                    <div>Author: {{ $post->author->name }}</div>
                </div>
            @endforeach
        </ul>
    </div>
</x-app-layout>