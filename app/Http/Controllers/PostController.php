<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts= Post::with(['categories', 'tags', 'comments'])->get();
        //$posts=Post::get();
        return $posts;
    }

    public function show($id){
        return Post::with(['categories', 'tags', 'comments.user'])->findOrFail($id);
    }
}
