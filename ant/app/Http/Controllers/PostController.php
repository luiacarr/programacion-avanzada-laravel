<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public funtion index()
    {
        
    }

    public funtion show ($id) {

return Post::with ('categories','tags', 'comments.user'])-finderOrFail($id);



    }
}
