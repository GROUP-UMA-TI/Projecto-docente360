<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvalucionController extends Controller
{
    public function vistaEvalucion()
    {
        return view('docente.evaluacion');
    }

    public function historialEvaluacion()
    {
        return view('docente.historial-evaluacion');
    }


}
