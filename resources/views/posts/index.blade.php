@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong> by {{ $post->author->name }} 
                (Category: {{ $post->category->name }})
            </li>
        @endforeach
    </ul>
</div>
@endsection