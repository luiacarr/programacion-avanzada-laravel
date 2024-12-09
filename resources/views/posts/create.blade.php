<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="w-full border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content</label>
            <textarea name="content" id="content" class="w-full border-gray-300 rounded mt-1" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection