<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\Service;
use App\Helpers\Uma;
use App\Helpers\Util;
use App\Models\GestionDocente\Evaluacion;
use Illuminate\Support\Facades\DB;
use App\Traits\Documentos\PdfDocumentTrait;
use Illuminate\Support\Facades\Auth;

class EvalucionController extends Controller
{
    use PdfDocumentTrait;

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

    public function registrarEvaluacion(Request $request)
    {
        $data = $request->validate([
            'periodo'             => 'required|string|max:255',
            'facultad'            => 'required|string|max:255',
            'programa_academico'  => 'required|string|max:255',
            'curso_codigo'        => 'required|string|max:255',
            'curso_nombre'        => 'required|string|max:255',
            'docente_dni'         => 'required|string|max:255',
            'docente_nombre'      => 'required|string|max:255',
            'semana'              => 'required|string|max:255',
            'tema'                => 'required|string|max:255',
            'inicio1'             => 'nullable',
            'inicio2'             => 'nullable',
            'inicio3'             => 'nullable',
            'desarrollo1'         => 'nullable',
            'desarrollo2'         => 'nullable',
            'desarrollo3'         => 'nullable',
            'desarrollo4'         => 'nullable',
            'cierre1'             => 'nullable',
            'cierre2'             => 'nullable',
            'cierre3'             => 'nullable',
            'otros'               => 'nullable',
            'total'               => 'nullable|numeric',
            'plan_mejora'         => 'nullable|string',
        ]);

        $existe = Evaluacion::where([
            'periodo'            => $data['periodo'],
            'facultad'           => $data['facultad'],
            'programa_academico' => $data['programa_academico'],
            'curso_codigo'       => $data['curso_codigo'],
            'docente_dni'        => $data['docente_dni'],
            'semana'             => $data['semana'],
        ])->exists();

        if ($existe) {
            return response()->json(
                Service::responseError('Ya existe un registro para esta evaluación.')
            );
        }

        $data['evaluador'] = trim(
            Auth::user()->grado . ' ' . Auth::user()->name . ' ' . Auth::user()->lastname
        );

        $data['firma'] = Auth::user()->firma;

        Evaluacion::create($data);

        return response()->json(
            Service::responseSuccess('Evaluación registrada correctamente.')
        );
    }

    public function historialEvaluacion()
    {
        return view('docente.historial-evaluacion');
    }

    public function listaHistorialEvaluacion()
    {        
        $listaDocente = Evaluacion::get();
        $listaDocente->transform(function ($item) {
            return [
                'periodo'             => Util::formatoPeriodo($item->periodo),
                'facultad'            => Util::nombreFacultades($item->facultad),
                'programa_academico'  => Uma::programasAcademicos($item->programa_academico),
                'docente_nombre'      => $item->docente_nombre,
                'curso_nombre'        => $item->curso_nombre,
                'btn_acciones'        => '<button class="btn btn-sm btn-primary btn-DescargarPdf" data-id="'.$item->id.'" title="Descargar PDF"><i class="ti ti-download"></i></button>',
            ];
        });
        
        return response()->json([
            'data' => $listaDocente
        ]);
    }

    public function pdfDocenteEvaluacion(Request $request)
    {
        
        if ($request->has('id')) {
            $evaluacion = Evaluacion::find($request->id);
        } else {
            $evaluacion = Evaluacion::where('periodo', $request->periodo)
                ->where('facultad', $request->facultad)
                ->where('programa_academico', $request->programa_academico)
                ->where('curso_codigo', $request->curso_codigo)
                ->where('docente_dni', $request->docente_dni)
                ->where('semana', $request->semana)
                ->first();
        }

        if (!$evaluacion) {
            return response()->json(Service::responseError('Evaluación no encontrada.'));
        }
        
        $datos = [
            'docente_evaluacion' => $evaluacion,
        ];

        $pdfData = $this->createPdfBase64Horizontal($datos, 'pdf.docente.registro-evaluacion', 'evaluacion-'.$evaluacion->docente_dni.'-'.$evaluacion->semana.'.pdf');
        return response()->json(Service::responseSuccess('Se generó el PDF correctamente.', $pdfData));
    }


}
