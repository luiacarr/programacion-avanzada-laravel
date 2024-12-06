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
        //
    }

    // Guarda un nuevo post y cachea el resultado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_ids' => 'array',
            'tag_ids' => 'array',
        ]);

        $post = Post::create($validated);
        $post->categories()->sync($request->category_ids);
        $post->tags()->sync($request->tag_ids);

        // Cacheamos el nuevo post
        Cache::put("post_{$post->id}", $post, 60);

        return redirect()->route('posts.show', $post);
    }

    // Muestra un post con sus categorías, tags y comentarios
    public function show($id)
    {
        // $post = Cache::remember("post_{$id}", 60, function () use ($id) {
            return Post::with(['categories', 'tags', 'comments.user'])->findOrFail($id);
        // });

        // return $post;
        // return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function getUseCache(Request $request, User $user)
    {
        $userPosts = Cache::remember("user_posts_{$user->id}", 60, function () use ($user) {
            return $user->posts()->with('categories', 'tags')->get();
        });
    }
}
