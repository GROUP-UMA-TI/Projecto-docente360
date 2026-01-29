<?php

namespace App\Models\Director;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDirector extends Model
{
    use HasFactory;

    protected $table = 'evaluacion_director';

    protected $fillable = [
        'periodo',
        'facultad',
        'programa_academico',
        'docente_dni',
        'nombre_docente',
        'planificacion',
        'evaluacion',
        'innovacion',
        'responsabilidad',
        'plan_mejora',
    ];
}

