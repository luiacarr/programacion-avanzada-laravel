<?php

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{friend}', function (User $friend) {
    return view('chat', [
        'friend' => $friend
    ]);
})->middleware(['auth'])->name('chat');

Route::get('/messages/{friend}', function (User $friend) {
    return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->with(['sender', 'receiver'])
        ->orderBy('íd', 'asc')
        ->get();
})->middleware(['auth']);

Route::post ('/messages/{friend}', function (User $friend) {
    $message=ChatMessage::create([
        'sender_id' =>auth()->id(),
        'receiver_id'=>$friend->id,
        'text' => request()->input('message')
    ]);

    broadcast(new MessageSent($message));

    return $message;

});




require __DIR__ . '/auth.php';
