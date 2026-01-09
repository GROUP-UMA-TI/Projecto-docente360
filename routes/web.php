<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();


Route::post('/auth-handler', [App\Http\Controllers\Auth\LoginController::class, 'handleAuth'])->name('auth.handler');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
