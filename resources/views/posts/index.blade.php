<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</a>
    <div class="mt-4">
        @foreach ($posts as $post)
            <div class="bg-white p-4 rounded shadow mb-4">
                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <div class="mt-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection