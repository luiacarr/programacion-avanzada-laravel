<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChatMessage extends Model
{
use HasFactory;

protected $fillable= [

    'sender_id',
    'reciver_id',
    'text'

];


public function sender ()
{
    return $this->belongsTo(User::class, 'sender_id');

}

public function receiver()
{
    return $this->belongsTo(User::class, 'receiver_id');

}



}