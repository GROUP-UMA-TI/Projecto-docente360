<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Evaluación Desempeño Docente</title>
    <style>
        .logo-img {
            /* logo en el encabezado de cada pagina centrado */
            text-align: center;
            opacity: 0.4;
        }


    </style>
</head>
<body>
<div class="logo-img">
    <img src="data:image/jpeg;base64,{{Util::base64ImgRelativo('/assets/images/logo-uma.png')}}" alt="Logo UMA" width="130">
</div>

<h1>Registro de Evaluación del Desempeño Docente</h1>

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
        <td>Hora de observación:</td>
        <td>15:00</td>
    </tr>
    <tr>
        <td>Escuela:</td>
        <td>{{Uma::areasNombres($docente_evaluacion->programa_academico)}}</td>
        <td>Resultado:</td>
        <td>{{Uma::puntajeDocente($docente_evaluacion->total)}}</td>
    </tr>
    <tr>
        <td>Curso:</td>
        <td>{{$docente_evaluacion->curso_nombre}}</td>
        <td>Puntaje obtenido:</td>
        <td>{{$docente_evaluacion->total}}</td>
    </tr>
    <tr>
        <td>Docente observado:</td>
        <td>{{$docente_evaluacion->docente_nombre}}</td>
        <td>Semana:</td>
        <td>{{$docente_evaluacion->semana}}</td>
    </tr>
    <tr>
        <td>Evaluador:</td>
        <td>{{$docente_evaluacion->evaluador}}</td>
        <td>Tema:</td>
        <td>{{$docente_evaluacion->tema}}</td>
    </tr>
</table>
<div class="page-break"></div>
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
        <td>Inicia la sesión utilizando dos o más estrategias que rompen el momento en el que se encuentra el estudiante y lo invita a involucrarse en el desarrollo de la sesión, así como el desarrollo de los saberes previos</td>
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
        <td>Evidencia la preparación de su sesión haciendo uso de diferentes recursos (TICs) en la sesión, como: audios, presentaciones, enlaces de videos o materiales de lectura, para la construcción de aprendizaje significativo en los estudiantes</td>
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
        <td>Relaciona el contenido de la clase con casos prácticos acordes a la realidad, promoviendo el análisis y reflexión de los estudiantes</td>
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
        <td>Plantea actividades que permite validar la comprensión del estudiante sobre el tema desarrollado en forma individual o colectiva</td>
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
        <td>Resume de forma muy sintetizada lo expuesto y analiza las conclusiones a las que se puede haber llegado respecto a lo presentado en el desarrollo</td>
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
        <td>Brinda espacios abiertos para consultas o aportes por parte de los estudiantes y brinda realimentación a los estudiantes sobre su aprendizaje</td>
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

<div class="plan-de-mejora">
    <h3>PLAN DE MEJORA:</h3>
    <p>{!! $docente_evaluacion->plan_mejora !!}</p>
</div>

<div class="evaluador-firma">
    <p><b><span>Evaluado por:</span></b></p>
    <p>{{$docente_evaluacion->evaluador}}</p>
</div>

</body>
</html>
