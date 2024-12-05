<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        // Validación automática por el FormRequest
        $validated = $request->validated();

        // Crear un nuevo post
        $post = Post::create($validated);

        return redirect()->route('posts.index');
    }

    // Mostrar el formulario para editar un post existente
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        // Verificar si el usuario tiene permiso para actualizar este post
        Gate::authorize('update', $post);

        // Actualizar el post
        $post->update($request->validated());

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Verificar si el usuario tiene permiso para eliminar este post
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
