<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function vistaEncuesta()
    {
        return view('docente.encuesta');
    }


}

    
