<?php

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Pest\Support\View;

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/dashboard', function () {
    return View('dashboard',['users' => User::whereNo('id',auth()->id())->get()]);
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{fried}', function (User $friend) {
    return View('chat',['friend' => $friend]);
})->middleware(['auth'])->name('chat');

Route::get('/messages/{fried}', function (User $friend) {
    return ChatMessage::query()
    ->where(function($query) use ($friend){
        $query->where('sender_id',auth()->id())
        ->where('receiver_id',$friend->id);
    })
    ->where(function($query)use ($friend){
        $query->where('sender_id',$friend->id())
        ->where('receiver_id', auth()->id());
    })
    ->with(['sender','receiver'])
    ->orderBy('id','asc')
    ->get();
})->middleware(['auth']);

Route::get('/messages/{fried}', function (User $friend) {
    $message=ChatMessage::create([
        'sender_id'=>auth()->id(),
         'receiver_id'=>$friend->id,
        'text'=>request()->imput('message')
    ]);
    broadcast(new Message($message));
    return $message;
});


require __DIR__.'/auth.php';