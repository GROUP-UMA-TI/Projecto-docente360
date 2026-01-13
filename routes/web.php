<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Docente\EvalucionController;


Route::get('/', function () {
    return redirect()->route('home');
});


Route::middleware(['auth'])->group(function () {
    Route::controller(EvalucionController::class)->group(function () {
        Route::get('/docente/evaluacion', 'vistaEvalucion')->name('docente.evaluacion');        
    });
});




Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
