<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado De Evaluación Del Director</title>
    <style>
        /* CONFIGURACIÓN DE PÁGINA PARA DOMPDF */
        @page {
            size: A4 landscape;
            margin-top: 2cm;
            margin-bottom: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }
        
        /* LOGO EN ENCABEZADO - FUERA DE MÁRGENES */
        .logo-container {
            position: fixed;
            top: -1.8cm;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1000;            
        }
        
        .logo-container img {
            opacity: 0.4;
            max-width: 120px;
            height: auto;
        }
        
        /* TÍTULO PRINCIPAL */
        .titulo-general {
            margin-top: 10px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* TABLAS CON BORDES LIMPIOS */
       table {        
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 11px;
        }

        .tabla-datos {
            border: 2px solid #34495e;
        }

        .tabla-datos td {
            border: 1px solid #bdc3c7;
            padding: 8px 10px;
            vertical-align: top;
        }

        .tabla-datos td:first-child,
        .tabla-datos td:nth-child(3) {
            background-color: #ecf0f1;
            font-weight: bold;
            width: 18%;
        }

        .tabla-competencias {
            border: 2px solid #34495e;
            margin-top: 30px;
        }

        .tabla-competencias th {
            background-color: #34495e;
            color: white;
            padding: 10px 8px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #2c3e50;
            font-size: 10px;
        }

        .tabla-competencias td {
            border: 1px solid #bdc3c7;
            padding: 6px 8px;
            vertical-align: top;
            text-align: left;
        }

        .tabla-competencias td:first-child {
            font-weight: bold;
            text-align: center !important;
            width: 12%;
        }

        .indicadores {
            text-align: center !important;
            width: 8%;
            font-weight: bold;
        }
            
        /* SALTOS DE PÁGINA */
        .page-break {
            page-break-before: always;
        }
        

        /* PREVENIR CORTES DE CONTENIDO */
        tr {
            page-break-inside: avoid;
        }
        
        td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
    
        .plan-de-mejora {
            margin-top: 40px;
            margin-bottom: 30px;
            padding: 20px;
        }

        .plan-de-mejora h3 {
            font-size: 14px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid #bdc3c7;
            padding-bottom: 8px;
        }

        .plan-de-mejora p {
            text-align: justify;
            line-height: 1.6;
            margin: 0;
            font-size: 11px;
            color: #2c3e50;
            text-indent: 20px;
        }

        .evaluador-firma {
            position: fixed;
            bottom: 0cm;
            right: 2cm;
            text-align: right;
        }

        .firma-bloque {
            display: inline-block;   
            text-align: center;
        }

        .linea-firma {
            border-top: 2px solid #2c3e50;
            margin-bottom: 6px;
        }

    </style>
</head>
<body>
<!-- PÁGINA 1 - DATOS GENERALES -->
<div class="logo-container">
    <img src="data:image/jpeg;base64,{{Util::base64ImgRelativo('/assets/images/logo-uma.png')}}" alt="Logo UMA">
</div>


<h1 class="titulo-general">Registro de Evaluación del Desempeño Docente</h1>


<table class="tabla-datos">
    <tr>
        <td>Periodo:</td>
        <td>{{Util::formatoPeriodo($evaluacion->periodo)}}</td>
        <td>Fecha de observación:</td>
        <td>{{Util::formatoSoloFecha($evaluacion->created_at)}}</td>
    </tr>
    <tr>
        <td>Facultad:</td>
        <td colspan="3">{{Util::nombreFacultades(Util::capitalizeWords($evaluacion->facultad))}}</td>        
    </tr>
    <tr>
        <td>Escuela:</td>
        <td colspan="3">{{Uma::programasAcademicos($evaluacion->programa_academico)}}</td>        
    </tr>
    <tr>
        <td>Docente observado:</td>
        <td colspan="3">{{Util::capitalizeWords($evaluacion->nombre_docente)}}</td>
    </tr>
    <tr>
        <td>Evaluador:</td>
        <td colspan="3">{{Util::capitalizeWords($evaluacion->evaluador)}}</td>
    </tr>
    <tr>
        <td>Puntaje obtenido:</td>
        <td>{{$evaluacion->total}}</td>
        <td>Resultado:</td>
        <td>{{Uma::puntajeDocente($evaluacion->total)}}</td>
    </tr>
</table>

<!-- PÁGINA 2 - Competencias DE EVALUACIÓN -->
<div class="page-break">
    <h1 class="titulo-general">Competencias de Evaluación</h1>
</div>
<table class="tabla-competencias">
    <thead>
    <tr>
        <th>Competencia</th>
        <th>criterio</th>
        <th>Indicador</th>
        <th class="indicadores">Siempre 5</th>
        <th class="indicadores">Casi siempre 4</th>
        <th class="indicadores">Normalmente 3</th>
        <th class="indicadores">Algunas veces 2</th>
        <th class="indicadores">Nunca 0</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">Competencia Pedagógica</td>
            <td>Planificación</td>
            <td>El docente comunica al coordinador de manera oportuna las mejoras que considera necesarias en el sílabo del curso, tales como ajustes en la bibliografía, organización de los contenidos, estrategias pedagógicas y criterios de evaluación.</td>  
            <td class="indicadores">@if($evaluacion->planificacion == 5) X @endif</td>
            <td class="indicadores">@if($evaluacion->planificacion == 4) X @endif</td>
            <td class="indicadores">@if($evaluacion->planificacion == 3) X @endif</td>
            <td class="indicadores">@if($evaluacion->planificacion == 2) X @endif</td>
            <td class="indicadores">@if($evaluacion->planificacion == 0) X @endif</td>
        </tr>

        <tr>
            <td>Evaluación</td>
            <td>A lo largo del periodo académico, y en base a los resultados obtenidos en las evaluaciones, el docente participa activamente en la implementación de rutas de acción que busquen mejorar el rendimiento académico de los estudiantes, siempre orientadas al logro de los resultados de aprendizaje establecidos.</td>
            <td class="indicadores">@if($evaluacion->evaluacion == 5) X @endif</td>
            <td class="indicadores">@if($evaluacion->evaluacion == 4) X @endif</td>
            <td class="indicadores">@if($evaluacion->evaluacion == 3) X @endif</td>
            <td class="indicadores">@if($evaluacion->evaluacion == 2) X @endif</td>
            <td class="indicadores">@if($evaluacion->evaluacion == 0) X @endif</td>
        </tr>

        <tr>
            <td rowspan="2">Competencias Conductuales</td>
            <td>Innovación y Trabajo en equipo</td>
            <td>El docente presenta propuestas innovadoras que contribuyen al logro de los objetivos de la coordinación, integrándose activamente en los grupos de trabajo y proponiendo soluciones que mejoren los procesos.</td>
            <td class="indicadores">@if($evaluacion->innovacion == 5) X @endif</td>
            <td class="indicadores">@if($evaluacion->innovacion == 4) X @endif</td>
            <td class="indicadores">@if($evaluacion->innovacion == 3) X @endif</td>
            <td class="indicadores">@if($evaluacion->innovacion == 2) X @endif</td>
            <td class="indicadores">@if($evaluacion->innovacion == 0) X @endif</td>
        </tr>

        <tr>
            <td>Responsabilidad y Compromiso</td>
            <td>El docente cumple responsablemente sus tareas y compromisos para la implementación del aprendizaje experiencial, la inteligencia artificial y el desarrollo de una mentalidad emprendedora. Participa activamente en capacitaciones y actividades de formación profesional.</td>
            <td class="indicadores">@if($evaluacion->responsabilidad == 5) X @endif</td>
            <td class="indicadores">@if($evaluacion->responsabilidad == 4) X @endif</td>
            <td class="indicadores">@if($evaluacion->responsabilidad == 3) X @endif</td>
            <td class="indicadores">@if($evaluacion->responsabilidad == 2) X @endif</td>
            <td class="indicadores">@if($evaluacion->responsabilidad == 0) X @endif</td>
        </tr>

    </tbody>
</table>


<!-- PÁGINA 3 - PLAN DE MEJORA -->
<div class="page-break">
        
    <div class="plan-de-mejora">
        <h3>PLAN DE MEJORA:</h3>
        <p>{!! $evaluacion->plan_mejora !!}</p>
    </div>

    <div class="evaluador-firma">
        <div class="firma-bloque">
            <div class="linea-firma"></div>
            <p><b>Evaluado por:</b></p>
            <p>{{$evaluacion->evaluador}}</p>
        </div>
    </div>

</div>

</body>
</html>
