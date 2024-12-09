<!-- resources/views/posts/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content</label>
            <textarea name="content" id="content" class="w-full border-gray-300 rounded mt-1" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection