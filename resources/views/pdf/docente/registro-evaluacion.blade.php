<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Evaluación Desempeño Docente</title>
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

        .tabla-criterios {
            border: 2px solid #34495e;
            margin-top: 30px;
        }

        .tabla-criterios th {
            background-color: #34495e;
            color: white;
            padding: 10px 8px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #2c3e50;
            font-size: 10px;
        }

        .tabla-criterios td {
            border: 1px solid #bdc3c7;
            padding: 6px 8px;
            vertical-align: top;
            text-align: left;
        }

        .tabla-criterios td:first-child {
            font-weight: bold;
            text-align: center !important;
            width: 12%;
        }

        .indicatores {
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
            border: 2px solid #34495e;
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
        <td>{{Util::formatoPeriodo($docente_evaluacion->periodo)}}</td>
        <td>Fecha de observación:</td>
        <td>{{Util::formatoFecha($docente_evaluacion->created_at)}}</td>
    </tr>
    <tr>
        <td>Facultad:</td>
        <td>{{Util::facultadNombresReales($docente_evaluacion->facultad)}}</td>
        <td>Resultado:</td>
        <td>{{Uma::puntajeDocente($docente_evaluacion->total)}}</td>
    </tr>
    <tr>
        <td>Escuela:</td>
        <td>{{Uma::areasNombres($docente_evaluacion->programa_academico)}}</td>
        <td>Puntaje obtenido:</td>
        <td>{{$docente_evaluacion->total}}</td>
    </tr>
    <tr>
        <td>Curso:</td>
        <td>{{$docente_evaluacion->curso_nombre}}</td>
        <td>Semana:</td>
        <td>{{$docente_evaluacion->semana}}</td>
    </tr>
    <tr>
        <td>Docente observado:</td>
        <td>{{$docente_evaluacion->docente_nombre}}</td>
        <td>Tema:</td>
        <td>{{$docente_evaluacion->tema}}</td>
    </tr>
    <tr>
        <td>Evaluador:</td>
        <td colspan="3">{{$docente_evaluacion->evaluador}}</td>
    </tr>
</table>

<!-- PÁGINA 2 - CRITERIOS DE EVALUACIÓN -->
<div class="page-break">
    <h1 class="titulo-general">Criterios de Evaluación</h1>
</div>
<table class="tabla-criterios">
    <thead>
    <tr>
        <th>MOMENTOS</th>
        <th>CRITERIO</th>
        <th>INDICADOR</th>
        <th class="indicatores">Alto</th>
        <th class="indicatores">Medio</th>
        <th class="indicatores">Bajo</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td rowspan="3">Inicio</td>
        <td>Bienvenida, indicaciones y repaso de la clase anterior</td>
        <td>Inicia la sesión utilizando dos o más estrategias que rompen el momento en el que se encuentra el estudiante</td>
        @if($docente_evaluacion->inicio1 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio1 == 1.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio1 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Evaluación sumativa</td>
        <td>Evalúa al estudiante de manera oral o con herramientas tecnológicas como: Zoom grupal, Mentimeter, Quizziz, etc.</td>
        @if($docente_evaluacion->inicio2 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio2 == 1.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio2 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Revisión del trabajo, casos u otras tareas</td>
        <td>Evalúa las evidencias de aprendizaje de las actividades solicitadas</td>
        @if($docente_evaluacion->inicio3 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio3 == 0.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->inicio3 == 0)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td rowspan="4">Desarrollo</td>
        <td>Logro de la sesión</td>
        <td>Menciona el logro de la sesión vinculándolo con el resultado general del curso</td>
        @if($docente_evaluacion->desarrollo1 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo1 == 0.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo1 == 0)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Presentación de recursos didácticos complementarios para el aprendizaje</td>
        <td>Evidencia la preparación de su sesión haciendo uso de diferentes recursos (TICs)</td>
        @if($docente_evaluacion->desarrollo2 == 3)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo2 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo2 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Marco teórico y aplicación</td>
        <td>Relaciona el contenido de la clase con casos prácticos</td>
        @if($docente_evaluacion->desarrollo3 == 3)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo3 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo3 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Evaluación formativa</td>
        <td>Plantea actividades que permite validar la comprensión del estudiante</td>
        @if($docente_evaluacion->desarrollo4 == 3)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo4 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->desarrollo4 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td rowspan="3">Cierre</td>
        <td>Conclusiones de la sesión</td>
        <td>Resume de forma muy sintetizada lo expuesto y analiza las conclusiones</td>
        @if($docente_evaluacion->cierre1 == 2)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre1 == 1.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre1 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Preguntas</td>
        <td>Brinda espacios abiertos para consultas o aportes por parte de los estudiantes</td>
        @if($docente_evaluacion->cierre2 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre2 == 0.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre2 == 0)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Anuncios de la próxima sesión y recordatorios</td>
        <td>Anuncia las actividades de la siguiente sesión</td>
        @if($docente_evaluacion->cierre3 == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre3 == 0.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->cierre3 == 0)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>
    <tr>
        <td>Otros</td>
        <td>Realimentación</td>
        <td>Realización de retroalimentación de la clase</td>
        @if($docente_evaluacion->otros == 1)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->otros == 0.5)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif

        @if($docente_evaluacion->otros == 0)
            <td class="indicatores">x</td>
        @else
            <td></td>
        @endif
    </tr>

    </tbody>
</table>


<!-- PÁGINA 3 - PLAN DE MEJORA -->
<div class="page-break">
        
    <div class="plan-de-mejora">
        <h3>PLAN DE MEJORA:</h3>
        <p>{!! $docente_evaluacion->plan_mejora !!}</p>
    </div>

    <div class="evaluador-firma">
        <div class="firma-bloque">
            <div class="linea-firma"></div>
            <p><b>Evaluado por:</b></p>
            <p>{{$docente_evaluacion->evaluador}}</p>
        </div>
    </div>

</div>

</body>
</html>
