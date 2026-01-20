<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Docente\EvalucionController;


Route::get('/', function () {
    return redirect()->route('home');
});


Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('usuarios')->group(function () {
                Route::get('/', 'index')->name('admin.usuarios');
                Route::get('/lista', 'serviceListaUsuarios')->name('admin.usuarios.lista');
                Route::post('/get', 'serviceGetUsuario')->name('admin.usuarios.get-usuario');
                Route::post('/crear-editar', 'crear_editarUsuario')->name('admin.usuarios.crear-editar');

                Route::get('/permisos', 'permisos')->name('admin.usuarios.permisos');
                Route::post('/permisos/buscar', 'buscarPermisos')->name('admin.usuarios.permisos.buscar');
                Route::post('/permisos/guardar', 'guardarPermisos')->name('admin.usuarios.permisos.guardar');
            });
        });
    });





    Route::controller(EvalucionController::class)->group(function () {
        Route::get('/docente/evaluacion', 'vistaEvalucion')->name('docente.evaluacion');  
        Route::get('/docente/historial-evaluacion', 'historialEvaluacion')->name('docente.historial-evaluacion');
    });
});




Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
