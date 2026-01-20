<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\Service;
use Illuminate\Support\Facades\DB;

class EvalucionController extends Controller
{
    public function vistaEvalucion()
    {
        return view('docente.evaluacion');
    }

    public function listaPeriodo()
    {
        try {
            $sql = "SELECT DISTINCT n_codper FROM vw_carga_docente WHERE n_codper >20232 ORDER BY n_codper DESC";
            $data = DB::connection('mysql_2')->select($sql);
            return response()->json(Service::responseSuccess($data));

        } catch (Exception $e) {
            return response()->json(Service::responseError($e->getMessage()));
        }
        
    }

    public function periodoFacultades( Request $request )
    {
        try {
            $n_codper = $request->input('n_codper');

            $sql = "SELECT c.c_codfac,CONCAT(f.cod_fac, ' - ', f.nom_fac) AS facultad
            FROM tb_facultad f
            INNER JOIN vw_carga_docente c ON f.cod_fac = c.c_codfac
            WHERE c.c_codfac NOT IN('T', 'X') AND c.n_codper = ?
            GROUP BY f.cod_fac, f.nom_fac";
            $data = DB::connection('mysql_2')->select($sql, [$n_codper]);
            return response()->json(Service::responseSuccess($data));

        } catch (Exception $e) {
            return response()->json(Service::responseError($e->getMessage()));
        }
        
    }

    public function facultadProgracademico( Request $request )
    {
        try {
            $n_codper = $request->input('n_codper');
            $c_codfac = $request->input('c_codfac');

            $sql = "SELECT n_codper, c_codfac,c_codesp, CONCAT(c_codesp, ' - ' ,nomesp) prog_academico
            FROM vw_carga_docente
            WHERE n_codper = ? AND c_codfac = ?
                AND c_codfac NOT IN ('T', 'X')
            GROUP BY n_codper, c_codfac, c_codesp, nomesp";
            $data = DB::connection('mysql_2')->select($sql, [$n_codper, $c_codfac]);
            return response()->json(Service::responseSuccess($data));

        } catch (Exception $e) {
            return response()->json(Service::responseError($e->getMessage()));
        }
        
    }


    public function prog_academicoCursos(Request $request)
    {
        try {
            $n_codper = $request->input('n_codper');
            $c_codfac = $request->input('c_codfac');
            $c_codesp = $request->input('c_codesp');

            $sql = "SELECT n_codper, c_codfac, c_codesp,nomesp,c_codcur,CONCAT(c_nomcur, ' - ' ,c_grpcur) nom_curso_seccion
            FROM vw_carga_docente
            WHERE n_codper = ? AND c_codfac = ? AND c_codesp= ? AND c_codfac NOT IN ('T', 'X')
            GROUP BY n_codper, c_codfac, c_codesp,nomesp,c_codcur,c_nomcur,c_grpcur";
            $data = DB::connection('mysql_2')->select($sql, [$n_codper, $c_codfac, $c_codesp]);
            return response()->json(Service::responseSuccess($data));

        } catch (Exception $e) {
            return response()->json(Service::responseError($e->getMessage()));
        }

    }

    public function cursosDocentes(Request $request)
    {
        try {
            $n_codper = $request->input('n_codper');
            $c_codfac = $request->input('c_codfac');
            $c_codesp = $request->input('c_codesp');
            $c_codcur = $request->input('c_codcur');
            $c_grpcur = $request->input('c_grpcur');

            $sql = "SELECT n_codper, c_codfac, c_codesp, nomesp, c_codcur, c_nomcur, c_grpcur, c_dnidoc, nombres
            FROM vw_carga_docente
            WHERE n_codper = ?
                AND c_codfac = ?
                AND c_codesp = ?
                AND c_codcur = ?
                AND c_grpcur = ?
                AND c_codfac NOT IN ('T', 'X')
            GROUP BY n_codper, c_codfac, c_codesp, nomesp, c_codcur, c_nomcur, c_grpcur, c_dnidoc, nombres";
            $data = DB::connection('mysql_2')->select($sql, [$n_codper, $c_codfac, $c_codesp, $c_codcur, $c_grpcur]);
            return response()->json(Service::responseSuccess($data));

        } catch (Exception $e) {
            return response()->json(Service::responseError($e->getMessage()));
        }

    }





    public function historialEvaluacion()
    {
        return view('docente.historial-evaluacion');
    }


}
