<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $filtable = ['title', 'content','user_id'];
    public function user()
    {
        return $this->belongsto(User::class);
        
    }
}
