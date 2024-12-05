<!-- resources/views/posts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection