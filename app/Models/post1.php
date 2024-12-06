<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post1 extends Model
{
    /** @use HasFactory<\Database\Factories\Post1Factory> */
    use HasFactory;
    protected $fillable =['title', 'content','user_id'];
}
