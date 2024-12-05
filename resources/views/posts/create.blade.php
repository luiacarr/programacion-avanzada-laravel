<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection