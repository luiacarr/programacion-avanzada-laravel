<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\PalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts',MasterController::class);
Route::resource('posts',PalletController::class);