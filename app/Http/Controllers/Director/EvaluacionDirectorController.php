<?php

namespace App\Http\Controllers\Director;

use App\Helpers\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Director\EvaluacionDirector;
use Illuminate\Support\Facades\Auth;

class EvaluacionDirectorController extends Controller
{
    public function vistaDirectorEvaluacion()
    {
        return view('director.evaluacion');
    }

    public function listaDocenteC_codesp(Request $request)
    {
        try {
            $n_codper = $request->input('n_codper');
            $c_codfac = $request->input('c_codfac');

            $sql = "
                SELECT 
                    t1.n_codper,
                    t1.c_dnidoc,
                    t1.nombres,
                    t1.nomesp,
                    t1.c_codesp,
                    t1.c_codfac,
                    t1.total_cursos
                FROM (
                    SELECT 
                        n_codper,
                        c_dnidoc,
                        nombres,
                        nomesp,
                        c_codesp,
                        c_codfac,
                        COUNT(DISTINCT c_codcur) AS total_cursos
                    FROM vw_carga_docente
                    WHERE n_codper = :n_codper1
                    AND c_codfac = :c_codfac1
                    AND c_codfac NOT IN ('X', 'T')
                    GROUP BY n_codper, c_dnidoc, nombres, nomesp, c_codesp, c_codfac
                ) AS t1
                INNER JOIN (
                    SELECT 
                        c_dnidoc,
                        MAX(total_cursos) AS max_cursos
                    FROM (
                        SELECT 
                            c_dnidoc,
                            COUNT(DISTINCT c_codcur) AS total_cursos
                        FROM vw_carga_docente
                        WHERE n_codper = :n_codper2
                        AND c_codfac = :c_codfac2
                        AND c_codfac NOT IN ('X', 'T')
                        GROUP BY c_dnidoc, nomesp, c_codesp, c_codfac
                    ) AS sub
                    GROUP BY c_dnidoc
                ) AS t2 ON t1.c_dnidoc = t2.c_dnidoc AND t1.total_cursos = t2.max_cursos
                INNER JOIN (
                    SELECT 
                        c_dnidoc,
                        MIN(c_codesp) AS min_codesp
                    FROM vw_carga_docente
                    WHERE n_codper = :n_codper3
                    AND c_codfac = :c_codfac3
                    AND c_codfac NOT IN ('X', 'T')
                    GROUP BY c_dnidoc
                ) AS t3 ON t1.c_dnidoc = t3.c_dnidoc AND t1.c_codesp = t3.min_codesp
            ";

            $data = DB::connection('mysql_2')->select($sql, [
                'n_codper1' => $n_codper,
                'c_codfac1' => $c_codfac,
                'n_codper2' => $n_codper,
                'c_codfac2' => $c_codfac,
                'n_codper3' => $n_codper,
                'c_codfac3' => $c_codfac,
            ]);

            return response()->json(Service::responseSuccess('Docentes obtenidos correctamente.', $data));

        } catch (\Exception $e) {
            return response()->json(Service::responseError('Error al obtener la lista de docentes.'));
        }

        
    }

    public function registrarEvaluacion(Request $request)
    {
        $request->validate([
            'periodo' => 'required|string',
            'facultad' => 'required|string',
            'programa_academico' => 'required|string',
            'docente_dni' => 'required|string',
            'nombre_docente' => 'required|string',
            'planificacion' => 'required|integer|min:1|max:5',
            'evaluacion' => 'required|integer|min:1|max:5',
            'innovacion' => 'required|integer|min:1|max:5',
            'responsabilidad' => 'required|integer|min:1|max:5',
            'puntaje_obtenido' => 'nullable|integer|min:0|max:20'
        ]);

        $evaluacion = EvaluacionDirector::where([
            'periodo' => $request->periodo,
            'facultad' => $request->facultad,
            'programa_academico' => $request->programa_academico,
            'docente_dni' => $request->docente_dni,
        ])->first();

        if(empty($evaluacion)){
            $evaluacion = new EvaluacionDirector();
            $evaluacion->periodo = $request->periodo;
            $evaluacion->facultad = $request->facultad;
            $evaluacion->programa_academico = $request->programa_academico;
            $evaluacion->docente_dni = $request->docente_dni;
            $evaluacion->nombre_docente = $request->nombre_docente;
            $evaluacion->planificacion = $request->planificacion;
            $evaluacion->evaluacion = $request->evaluacion;
            $evaluacion->innovacion = $request->innovacion;
            $evaluacion->responsabilidad = $request->responsabilidad;
            $evaluacion->plan_mejora = $request->plan_mejora;
            $evaluacion->total = $request->puntaje_obtenido;
            $evaluacion->evaluador = Auth::user()->name . ' ' . Auth::user()->lastname;
            $evaluacion->firma = Auth::user()->firma ?? null;          

            if($evaluacion->save()){

                return response()->json(Service::responseSuccess('Evaluación registrada correctamente.'));
            } else {
                return response()->json(Service::responseError('Error al registrar la evaluación.'));
            }

        }else{
            return response()->json(Service::responseError('Ya existe una evaluación para este docente en el periodo y programa académico especificados.'));
        }


    }


        


}
