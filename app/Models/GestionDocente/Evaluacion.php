<?php

namespace App\Models\GestionDocente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $fillable = [
        'periodo',
        'facultad',
        'programa_academico',
        'curso_codigo',
        'curso_nombre',
        'docente_dni',
        'docente_nombre',
        'evaluador',
        'semana',
        'tema',
        'inicio1',
        'inicio2',
        'inicio3',
        'desarrollo1',
        'desarrollo2',
        'desarrollo3',
        'desarrollo4',
        'cierre1',
        'cierre2',
        'cierre3',
        'otros',
        'total',
        'firma',
        'plan_mejora',
    ];

}
