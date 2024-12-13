<?php

use App\Http\Controllers\ProfileController;
use App\Models\Chatmessage;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use function Pest\Laravel\get;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard', ['users' => User::wherenot('id',auth()->id())->get()]);
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{friend})', function (User $friend) {
    return view('chat', ['friend' => $friend]);
})->middleware(['auth'])->name('chat');

Route::get('/messages/{friend})', function (User $friend) {
    return Chatmessage::query()
    ->where(function ($query) use ($friend) {
        $query->where('sender_id', auth()->id())
        ->where('receiver_id', $friend()->id());
    })
    ->orWhere(function ($query) use ($friend) {
        $query->where('sender_id', $friend->id)
        ->where('receiver_id', auth()->id());
    })
        ->with(['sender','receiver'])
        ->orderBy('id','asc')
        ->get();
})->middleware(['auth']);
Route::post('/messages/{friend})', function (User $friend) {
    $message = Chatmessage::created([
        'sender_id' => auth()-> id,
        'receiver_id' =>$friend->id,
        'text'=> request()->imput('message')
        ]
    );
    broadcast(new MessageSent($message));
    return $message;
});

require __DIR__.'/auth.php';