<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MsgController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [MsgController::class, 'home'])->name('home');
Route::post('/telegram', [MsgController::class, 'telegramhandle']);
