<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Docente\EvalucionController;
use App\Http\Controllers\Director\EvaluacionDirectorController;


Route::get('/', function () {
    return redirect()->route('home');
});


Route::middleware(['auth'])->group(function () {
    
    Route::controller(UserController::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('usuarios')->group(function () {
                Route::get('/', 'index')->name('admin.usuarios')->middleware('permission:1.1.1');
                Route::get('/lista', 'serviceListaUsuarios')->name('admin.usuarios.lista');
                Route::post('/get', 'serviceGetUsuario')->name('admin.usuarios.get-usuario');
                Route::post('/crear-editar', 'crear_editarUsuario')->name('admin.usuarios.crear-editar');

                Route::get('/permisos', 'permisos')->name('admin.usuarios.permisos')->middleware('permission:1.1.2');
                Route::post('/permisos/buscar', 'buscarPermisos')->name('admin.usuarios.permisos.buscar');
                Route::post('/permisos/guardar', 'guardarPermisos')->name('admin.usuarios.permisos.guardar');
            });
        });
    });





    Route::prefix('docente/evaluacion')
    ->name('docente.evaluacion.')
    ->controller(EvalucionController::class)
    ->group(function () {

        Route::get('/', 'vistaEvalucion')->name('index');
        Route::get('/lista-periodo', 'listaPeriodo')->name('lista-periodo');
        Route::get('/periodo-facultades', 'periodoFacultades')->name('periodo-facultades');
        Route::get('/facultad-progracademico', 'facultadProgracademico')->name('facultad-progracademico');
        Route::get('/prog-academico-cursos', 'prog_academicoCursos')->name('prog-academico-cursos');
        Route::get('/cursos-docentes', 'cursosDocentes')->name('cursos-docentes');
        Route::post('/registrar-evaluacion', 'registrarEvaluacion')->name('registrar-evaluacion');
        Route::get('/historial', 'vistaHistorialEvaluacion')->name('historial');
        Route::get('/historial/lista', 'listaHistorialEvaluacion')->name('historial.lista');
        Route::post('/pdf', 'pdfDocenteEvaluacion')->name('pdf');
    });


    Route::prefix('director/evaluacion')
        ->name('director.evaluacion.')
        ->controller(EvaluacionDirectorController::class)
        ->group(function () {

            Route::get('/', 'vistaDirectorEvaluacion')->name('index');
            Route::get('lista-docente-codesp', 'listaDocenteC_codesp')->name('lista-docente-codesp');
            Route::post('registrar', 'registrarEvaluacion')->name('registrar');
            Route::post('pdf', 'pdfEvaluacion')->name('pdf');
            Route::get('historial', 'vistaHistorialEvaluacion')->name('historial');
            Route::get('historial/lista', 'listaHistorialEvaluacion')->name('historial.lista');
        });

        





});




Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
