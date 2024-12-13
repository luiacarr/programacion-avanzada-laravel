<?php

use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard',['users'=>User::whereNot('id',auth()->id())->get()]);
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{friend}', function (User $friend) {
    return view('chat',['friend'=>$fiend]);
})->middleware(['auth'])->name('chat');

Route::get('/messages/{friend}', function (User $friend) {
    return ChatMessage::query()
    ->where(function($query) use ($friend){
        $query->where('sender_id',auth()->id())
        ->where('receiver_id',$friend->id);
    })
    ->orwhere(function($query) use ($friend){
        $query->where('sender_id',$friend->id)
        ->where('receiver_id', auth()->id());
    })
    ->whith(['sender','receiver'])
    ->orderBy('id','asc')
    ->get();
})->middleware(['auth']);

Route::get('/messages/{friend}', function (User $friend) {
    $message= ChatMessage::create([
        'sender_id'=>auth()->id(),
        'receiver_id'=>$friend->id,
        'text'=>request()->input('message')
    ]);

    broadcast(new MessageSent($message));

    return $message;
});

require __DIR__.'/auth.php';