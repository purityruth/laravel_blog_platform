<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latest Blog Posts</title>
</head>
<body>
    <h1>Latest Blog Posts</h1>
    @foreach ($posts as $post)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            @if (!empty($post->featured_image_url))
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover"> {{-- Featured image --}}
            @endif
            <h3>{{ $post->title }}</h3> {{-- Post title --}}
            <p>{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
            <div>Category: {{ $post->category->name }}</div>
        </div>
    @endforeach
</body>
</html>
