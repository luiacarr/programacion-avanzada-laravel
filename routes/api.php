<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/post/{id}', [PostController::class, 'show']);
// Route::post('/post', [PostController::class, 'store']);
// Route::put('/post', [PostController::class, 'update']);
// Route::delete('/post', [PostController::class, 'destroy']);

Route::get('hash', function () {
    return Hash::make('password');
});

Route::get('crypt', function () {
    return Crypt::make('password');
});