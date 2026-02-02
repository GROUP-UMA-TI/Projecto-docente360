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

                Route::get('/permisos', 'permisos')->name('admin.usuarios.permisos');
                Route::post('/permisos/buscar', 'buscarPermisos')->name('admin.usuarios.permisos.buscar');
                Route::post('/permisos/guardar', 'guardarPermisos')->name('admin.usuarios.permisos.guardar');
            });
        });
    });





    Route::controller(EvalucionController::class)->group(function () {
        Route::get('/docente/evaluacion', 'vistaEvalucion')->name('docente.evaluacion'); 
        Route::get('/docente/evaluacion/lista-periodo', 'listaPeriodo')->name('docente.evaluacion.lista-periodo');
        Route::get('/docente/evaluacion/periodo-facultades', 'periodoFacultades')->name('docente.evaluacion.periodo-facultades');
        Route::get('/docente/evaluacion/facultad-progracademico', 'facultadProgracademico')->name('docente.evaluacion.facultad-progracademico');
        Route::get('/docente/evaluacion/prog-academico-cursos', 'prog_academicoCursos')->name('docente.evaluacion.prog-academico-cursos');
        Route::get('/docente/evaluacion/cursos-docentes', 'cursosDocentes')->name('docente.evaluacion.cursos-docentes');
        Route::post('/docente/evaluacion/registrar-evaluacion', 'registrarEvaluacion')->name('docente.evaluacion.registrar-evaluacion');
        Route::post('/docente/evaluacion/pdf', 'pdfDocenteEvaluacion')->name('docente.evaluacion.pdf');
        Route::get('/docente/evaluacion/historial', 'listaHistorialEvaluacion')->name('docente.evaluacion.historial');


        Route::get('/docente/historial-evaluacion', 'vistaHistorialEvaluacion')->name('docente.vista.historial-evaluacion');
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
