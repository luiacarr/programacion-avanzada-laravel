<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['categories', 'tags', 'comments'])->get();

        return $posts;
        // git add .
        // git commit -m "Add PostController"
        // git push
    }

    // Guarda un nuevo post y cachea el resultado
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => 1,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function create()
    {
        return view('posts.create');
    }

    // Muestra un post con sus categorías, tags y comentarios
    public function show($id)
    {
        
        return Post::with(['categories', 'tags', 'comments.user'])->findOrFail($id);
        
        // php artisan serve
        
        
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function getUseCache(Request $request, User $user)
    {
        $userPosts = Cache::remember("user_posts_{$user->id}", 60, function () use ($user) {
            return $user->posts()->with('categories', 'tags')->get();
        });
    }
}
