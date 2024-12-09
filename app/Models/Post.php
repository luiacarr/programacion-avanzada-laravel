<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    public function categories(){
        return $this->belongToMany(Category::class);

    }
    public function tags(){
        return $this->belongToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    protected $fillable = ['title', 'content', 'user_id'];
}
