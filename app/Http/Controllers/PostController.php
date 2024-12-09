<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RecursiveIterator;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with([ 'categories','tags','commens'])->get();
        return $posts;
    }
    public function show($id)
    {
        return Post::with(['categories','tags','commens.user'])->fileinode($id);
    }

}
