<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

///php artisan make:controller PostController

///Route::get('/post', [PostController::class, 'index']);
// Route::post('/post', [PostController::class, 'store']);
// Route::put('/post', [PostController::class, 'update']);
// Route::delete('/post', [PostController::class, 'destroy']);