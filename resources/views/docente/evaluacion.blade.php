@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">EVALUACION DOCENTE</h5>
                <small class="text-muted">Complete la información requerida para registrar la evaluación</small>
            </div>

            <div class="card-body">
                <form>
                    @csrf
                    <div class="row g-4">

                        <!-- COLUMNA IZQUIERDA -->
                        <div class="col-md-6">

                            <!-- CONTEXTO ACADÉMICO -->
                            <h6 class="mb-3 text-secondary">Contexto Académico</h6>

                            <div class="mb-3">
                                <label class="form-label">Periodo Académico</label>
                                <select id="select2Periodos" class="form-control select2" data-toggle="select2">
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Facultad</label>
                                <select id="select2Facultades" class="form-control select2" data-toggle="select2">

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Programa / Especialidad</label>
                                <select id="select2Programas" class="form-control select2" data-toggle="select2">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Curso</label>
                                <select id="select2Cursos" class="form-control select2" data-toggle="select2">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Docente</label>
                                    <select id="select2Docentes" class="form-control select2" data-toggle="select2">
                                    </select>                                
                            </div>

                        </div>

                        <!-- COLUMNA DERECHA -->
                        <div class="col-md-6">

                            <!-- DATOS DE LA SESIÓN -->
                            <h6 class="mb-3 text-secondary">Datos de la Sesión</h6>

                            <div class="mb-3">
                                <label class="form-label">Evaluador</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name .' '.Auth::user()->lastname}}" disabled>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Semana</label>
                                    <select class="form-select" id="select2Semana">
                                        <option selected disabled>Seleccionar</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Tema de la Sesión</label>
                                    <input type="text" class="form-control" placeholder="Tema desarrollado" id="temaSesion">
                                </div>
                            </div>

                            <!-- RESULTADO -->
                            <h6 class="mb-3 text-secondary">Resultado de la Evaluación</h6>
                            
                            <div class="row g-3">
                                <div class="col-md-7">
                                    <label class="form-label">Resultado</label>
                                    <input type="text" class="form-control" id="resultadoObservacion" readonly>
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label">Puntaje</label>
                                    <input type="number" class="form-control" id="puntajeObtenido" readonly>
                                </div>
                            </div>
                            <!-- ACCIONES -->
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-outline-success" id="btnExportarPDF">
                                    Exportar PDF
                                </button>
                                <button type="button" class="btn btn-warning" id="btnCalcularNota">
                                    Calcular Nota
                                </button>
                                <button type="button" class="btn btn-info" id="btnRegistrarEvaluacion">
                                    Registrar Evaluación
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">

                    <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Momentos</th>
                            <th>Criterio</th>
                            <th>Indicador</th>
                            <th>Alto</th>
                            <th>Medio</th>
                            <th>Bajo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3">Inicio</td>
                            <td>Bienvenida, indicaciones y repaso de la clase anterior</td>
                            <td>Inicia la sesión utilizando dos o más estrategias que rompen el momento en el que se encuentra el estudiante y lo invita a involucrarse en el desarrollo de la sesión, brinda las indicaciones de inicio de sesión, así como el desarrollo de los saberes previos
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente inicia la sesión utilizando dos o más estrategias que rompen el momento en el que se encuentra el estudiante y lo invita a involucrarse en el desarrollo de la sesión, brinda las indicaciones de inicio de sesión, así como el desarrollo de los saberes previos.</div><br>
                        <div><strong>MEDIO :</strong> El docente inicia la sesión obviando el uso de estrategias que permiten un rol activo del estudiante, limitándose a brindar las indicaciones de inicio de sesión, así como el desarrollo de los saberes previos.</div><br>
                        <div><strong>BAJO :</strong> El docente no utiliza estrategia alguna para involucrar a los estudiantes en el inicio de la sesión, limitándose a brindar las indicaciones de inicio de sesión.</div>"></i>

                             </td>
                            <td><input type="radio" class="form-check-input" name="inicio1" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="inicio1" value="1.5"></td>
                            <td><input type="radio" class="form-check-input" name="inicio1" value="1"></td>
                        </tr>
                        <tr>
                            <td>Evaluación sumativa</td>
                            <td>Evalúa al estudiante de manera oral o con herramientas tecnológicas como: Zoom grupal, Mentimeter, Quizizz, etc.
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente evalúa al estudiante de manera oral o con herramientas tecnológicas como: Zoom grupal, Mentimeter, Quizziz, etc. y brinda realimentación sobre el tema.</div><br>
                        <div><strong>MEDIO :</strong> El docente evalúa al estudiante de manera oral y con herramientas tecnológicas como: Zoom grupal, Mentimeter, Quizziz, etc. Pero no brinda realimentación sobre el tema.</div><br>
                        <div><strong>BAJO :</strong> El docente evalúa al estudiante de manera oral pero no hace uso de  alguna  herramientas tecnológica.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="inicio2" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="inicio2" value="1.5"></td>
                            <td><input type="radio" class="form-check-input" name="inicio2" value="1"></td>
                        </tr>
                        <tr>
                            <td>Revisión del trabajo, casos u otras tareas</td>
                            <td>Evalúa las evidencias de aprendizaje de las actividades solicitadas
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente evalúa las evidencias de aprendizaje de las actividades utilizando instrumentos de medición que fueron socializados previamente.</div><br>
                        <div><strong>MEDIO :</strong> El docente evalúa las evidencias de aprendizaje de las actividades con instrumentos que no fueron socializados previamente.</div><br>
                        <div><strong>BAJO :</strong> El docente no evalúa las evidencias de aprendizaje de las actividades.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="inicio3" value="1"></td>
                            <td><input type="radio" class="form-check-input" name="inicio3" value="0.5"></td>
                            <td><input type="radio" class="form-check-input" name="inicio3" value="0"></td>
                        </tr>

                        <tr>
                            <td rowspan="4">Desarrollo</td>
                            <td>Logro de la sesión</td>
                            <td>Menciona el logro de la sesión vinculándolo con el resultado general del curso
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong>  El docente menciona el logro de la sesión vinculándolo con el resultado general del curso que indica el sílabo.</div><br>
                        <div><strong>MEDIO :</strong> El docente menciona el logro de la sesión sin vincularlo con el resultado general del curso.</div><br>
                        <div><strong>BAJO :</strong>  El docente no menciona el logro de la sesión.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="desarrollo1" value="1"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo1" value="0.5"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo1" value="0"></td>
                        </tr>
                        <tr>
                            <td>Presentación de recursos didácticos complementarios para el aprendizaje</td>
                            <td>Evidencia la preparación de su sesión haciendo uso de diferentes recursos (TICs) en la sesión, como: audios, presentaciones, enlaces de videos o materiales de lectura y otros, para la construcción de aprendizaje significativo en los estudiantes
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente evidencia la preparación de su sesión haciendo uso de su ppt más 3 recursos (TICs) adicionales: audios, presentaciones, enlaces de videos o  materiales de lectura y otros..</div><br>
                        <div><strong>MEDIO :</strong> El docente evidencia la preparación de su sesión haciendo uso de su ppt más 2 recursos (TICs) adicionales: audios, presentaciones, enlaces de videos o  materiales de lectura y otros..</div><br>
                        <div><strong>BAJO :</strong> El docente evidencia la preparación de su sesión haciendo uso de su ppt más un recurso (TICs) adicional: audios, presentaciones, enlaces de videos o  materiales de lectura y otros.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="desarrollo2" value="3"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo2" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo2" value="1"></td>
                        </tr>
                        <tr>
                            <td>Marco teórico y aplicación</td>
                            <td>Relaciona el contenido de la clase con casos prácticos acordes a la realidad, promoviendo el análisis y reflexión de los estudiantes
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente relaciona el contenido de la clase con casos prácticos acordes a la realidad, promoviendo el análisis y reflexión de los estudiantes.</div><br>
                        <div><strong>MEDIO :</strong> El docente relaciona el contenido de la clase con casos prácticos no acordes a la realidad, el cual no promueve el análisis y reflexión de los estudiantes.</div><br>
                        <div><strong>BAJO :</strong> El docente relaciona el contenido de la clase con casos prácticos no acordes a la realidad.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="desarrollo3" value="3"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo3" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo3" value="1"></td>
                        </tr>
                        <tr>
                            <td>Evaluación formativa</td>
                            <td>Plantea actividades que permite validar la comprensión del estudiante sobre el tema desarrollado en forma individual o colectiva
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong>  El docente plantea actividades que permite validar la comprensión del estudiante sobre el tema desarrollado en forma individual y colectiva.</div><br>
                        <div><strong>MEDIO :</strong> El docente plantea actividades que permite validar la comprensión del estudiante sobre el tema desarrollado en forma individual o colectiva.</div><br>
                        <div><strong>BAJO :</strong> El docente plantea actividades que no permite validar la comprensión del estudiante sobre el tema desarrollado solo en forma individual.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="desarrollo4" value="3"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo4" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="desarrollo4" value="1"></td>
                        </tr>
                        <tr>
                            <td rowspan="4">Cierre</td>
                            <td>Preguntas</td>
                            <td>Brinda espacios abiertos para consultas o dudas por parte de los estudiantes y brinda realimentación a los estudiantes sobre su aprendizaje
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente plantea preguntas abiertas e invita en forma explícita a los estudiantes a participar brindando opinones y/o ideas, en diversos momentos de la sesión .</div><br>
                        <div><strong>MEDIO :</strong>  El docente formula preguntas a los estudiantes y facilita algunas oportunidades para que ellos respondan en diversos momentos de la sesión .</div><br>
                        <div><strong>BAJO :</strong> El docente formula preguntas a los estudiantes, pero no facilita oportunidades para que ellos respondan en diversos momentos de la sesión .</div>"></i>
                            </td>
                            <td><input type="radio" class="form-check-input" name="cierre2" value="1"></td>
                            <td><input type="radio" class="form-check-input" name="cierre2" value="0.5"></td>
                            <td><input type="radio" class="form-check-input" name="cierre2" value="0"></td>                            
                        </tr>
                        <tr>
                            <td>Realimentación</td>
                            <td>Realización de retroalimentación de la clase
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente sintetiza de manera concisa lo expuesto y analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div><br>
                        <div><strong>MEDIO :</strong> El docente sintetiza de manera ambigua lo expuesto y no analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div><br>
                        <div><strong>BAJO :</strong> El docente no sintetiza de manera concisa lo expuesto, tampoco analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="otros" value="1"></td>
                            <td><input type="radio" class="form-check-input" name="otros" value="0.5"></td>
                            <td><input type="radio" class="form-check-input" name="otros" value="0"></td>
                        </tr>
                        <tr>
                            <td>Conclusiones de la sesión</td>
                            <td>Resume de forma muy sintetizada lo expuesto y analiza las conclusiones a las que se puede haber llegado respecto a lo presentado en el desarrollo
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente sintetiza de manera concisa lo expuesto y analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div><br>
                        <div><strong>MEDIO :</strong> El docente sintetiza de manera ambigua lo expuesto y no analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div><br>
                        <div><strong>BAJO :</strong> El docente no sintetiza de manera concisa lo expuesto, tampoco analiza las posibles conclusiones derivadas de lo presentado durante el desarrollo.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="cierre1" value="2"></td>
                            <td><input type="radio" class="form-check-input" name="cierre1" value="1.5"></td>
                            <td><input type="radio" class="form-check-input" name="cierre1" value="1"></td>                            
                        </tr>
                        <tr>
                            <td>Anuncios de la próxima sesión y recordatorios</td>
                            <td>Anuncia las actividades de la siguiente sesión
                                <i class="ti ti-info-circle fs-3 criteria-icon text-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<div><strong>ALTO :</strong> El docente anuncia detalladamente las actividades de la siguiente sesión.</div><br>
                        <div><strong>MEDIO :</strong> El docente anuncia las actividades de la siguiente sesión.</div><br>
                        <div><strong>BAJO :</strong>  El docente no anuncia las actividades de la siguiente sesión.</div>"></i>

                            </td>
                            <td><input type="radio" class="form-check-input" name="cierre3" value="1"></td>
                            <td><input type="radio" class="form-check-input" name="cierre3" value="0.5"></td>
                            <td><input type="radio" class="form-check-input" name="cierre3" value="0"></td>
                        </tr>
                       
                        <tr>
                            <td colspan="6">
                            <p><strong>PLAN DE MEJORA:</strong> </p>
                                <div class="summernote" id="planMejora">

                                </div>

                            <div style="width: 350px; margin: 0 auto; text-align: center;padding-top: 30px;">
                                <p><b><span>Realizado por:</span></b></p>
                                <div style="display: inline-block;">

                                    <p style="margin: 0; line-height: 1.3;">{{Auth::user()->grado .' '.Auth::user()->name .' '. Auth::user()->lastname}} </p>
                                    <p style="margin: 0; line-height: 1.3;">Docente evaluador </p>
                                    {{-- <p style="margin: 0; line-height: 1.3;">2025-I</p> --}}
                                </div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
    
                </div>

            
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')

    <!-- Summernote Plugin Js -->
    <script src="/assets/plugins/summernote/summernote-bs5.min.js"></script>

    <!-- Summernote Init -->
    <script src="/assets/js/pages/form-summernote.js"></script>



<script>
    $(document).ready(function() {
        

        $.ajax({
            type: 'GET',
            url:"{{ route('docente.evaluacion.lista-periodo') }}",
            dataType: 'json',
            success: function (response) {                
                if(response.status == 200){
                    $('#select2Periodos').empty();                    
                    $('#select2Periodos').append('<option value="" selected disabled>Seleccionar periodo</option>');                    
                    $.each(response.message, function(index, p) {
                        $('#select2Periodos').append('<option value="' + p.n_codper + '">' + p.n_codper + '</option>');
                    });
                    
                } else {
                    GS.modalAdvertencia(response.message);
                }
            },
            error: function(xhr, status, error) {
                GS.modalError('Error en la solicitud AJAX', error);
            }
        });

        $('#select2Periodos').on('change', function() {
            var n_codper = $(this).val();
            
            // LIMPIAR TODOS LOS SELECTS DEPENDIENTES
            $('#select2Facultades').empty().append('<option value="">Seleccionar facultad</option>');
            $('#select2Programas').empty().append('<option value="">Seleccionar programa</option>');
            $('#select2Cursos').empty().append('<option value="">Seleccionar curso</option>');
            $('#select2Docentes').empty().append('<option value="">Seleccionar docente</option>');
            
            if (n_codper) {
                GS.inicioSolicitud();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('docente.evaluacion.periodo-facultades') }}",
                    data: { n_codper: n_codper },
                    dataType: 'json',
                    success: function(response) {
                        GS.finSolicitud();
                        if (response.status == 200) {
                            $('#select2Facultades').empty();
                            $('#select2Facultades').append('<option value="" selected disabled>Seleccionar facultad</option>');
                            $.each(response.message, function(index, f) {
                                $('#select2Facultades').append('<option value="' + f.c_codfac + '">' + f.facultad + '</option>');
                            });
                        } else {
                            GS.modalAdvertencia(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        GS.finSolicitud();
                        GS.modalError('Error en la solicitud AJAX', error);
                    }
                });
            }
        });


        $('#select2Facultades').on('change', function() {
            var n_codper = $('#select2Periodos').val();
            var c_codfac = $(this).val();
            
            // LIMPIAR SELECTS DEPENDIENTES
            $('#select2Programas').empty().append('<option value="">Seleccionar programa</option>');
            $('#select2Cursos').empty().append('<option value="">Seleccionar curso</option>');
            $('#select2Docentes').empty().append('<option value="">Seleccionar docente</option>');
            
            if (c_codfac) {
                GS.inicioSolicitud();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('docente.evaluacion.facultad-progracademico') }}",
                    data: { n_codper: n_codper, c_codfac: c_codfac },
                    dataType: 'json',
                    success: function(response) {
                        GS.finSolicitud();
                        if (response.status == 200) {
                            $('#select2Programas').empty();
                            $('#select2Programas').append('<option value="" selected disabled>Seleccionar programa</option>');
                            $.each(response.message, function(index, p) {
                                $('#select2Programas').append('<option value="' + p.c_codesp + '">' + p.prog_academico + '</option>');
                            });
                        } else {
                            GS.modalAdvertencia(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        GS.finSolicitud();
                        GS.modalError('Error en la solicitud AJAX', error);
                    }
                });
            }
        });


        $('#select2Programas').on('change', function() {
            var n_codper = $('#select2Periodos').val();
            var c_codfac = $('#select2Facultades').val();
            var c_codesp = $(this).val();
            
            // LIMPIAR SELECTS DEPENDIENTES
            $('#select2Cursos').empty().append('<option value="">Seleccionar curso</option>');
            $('#select2Docentes').empty().append('<option value="">Seleccionar docente</option>');
            
            if (c_codesp) {
                GS.inicioSolicitud();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('docente.evaluacion.prog-academico-cursos') }}",
                    data: { n_codper: n_codper, c_codfac: c_codfac, c_codesp: c_codesp },
                    dataType: 'json',
                    success: function(response) {
                        GS.finSolicitud();
                        if (response.status == 200) {
                            $('#select2Cursos').empty();
                            $('#select2Cursos').append('<option value="" selected disabled>Seleccionar curso</option>');
                            $.each(response.message, function(index, c) {
                                $('#select2Cursos').append('<option value="' + c.c_codcur + '" data-nombre="' + c.nom_curso_seccion + '">' + c.nom_curso_seccion + '</option>');
                            });
                        } else {
                            GS.modalAdvertencia(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        GS.finSolicitud();
                        GS.modalError('Error en la solicitud AJAX', error);
                    }
                });
            }
        });


        $('#select2Cursos').on('change', function() {
            var n_codper = $('#select2Periodos').val();
            var c_codfac = $('#select2Facultades').val();
            var c_codesp = $('#select2Programas').val();
            var c_codcur = $(this).val();
            var c_grpcur = $('#select2Cursos option:selected').text().split(' - ')[1];
            
            // LIMPIAR SELECT DEPENDIENTE
             $('#select2Docentes').empty().append('<option value="" selected disabled>Seleccionar docente</option>');        
            
            if (n_codper && c_codfac && c_codesp && c_codcur && c_grpcur) {
                GS.inicioSolicitud();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('docente.evaluacion.cursos-docentes') }}",
                    data: { n_codper: n_codper,
                             c_codfac: c_codfac, 
                             c_codesp: c_codesp, 
                             c_codcur: c_codcur, 
                             c_grpcur: c_grpcur 
                            },
                    dataType: 'json',
                    success: function(response) {
                        GS.finSolicitud();
                        if (response.status == 200) {
                            $('#select2Docentes').empty();
                            $('#select2Docentes').append('<option value="" selected disabled>Seleccionar docente</option>');
                            $.each(response.message, function(index, d) {
                                $('#select2Docentes').append('<option value="' + d.c_dnidoc + '" data-nombre="' + d.nombres + '">' + d.nombres + '</option>');
                            });
                        } else {
                            GS.modalAdvertencia(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        GS.finSolicitud();
                        GS.modalError('Error en la solicitud AJAX', error);
                    }
                });
            }
        });


        $('#btnCalcularNota').click(function (){
            const criterios = [
                'inicio1', 'inicio2', 'inicio3',
                'desarrollo1', 'desarrollo2', 'desarrollo3', 'desarrollo4',
                'cierre1', 'cierre2', 'cierre3',
                'otros'
            ];
            let totalPuntaje = 0;
            let todosCriterios = true;

            criterios.forEach(element => {
                if($('input[name="' + element + '"]:checked').length > 0){
                    totalPuntaje += parseFloat($('input[name="' + element + '"]:checked').val());
                } else {
                    todosCriterios = false;                  
                }
                
            });

            if(!todosCriterios){
                GS.modalAdvertencia('Por favor, complete la evaluación seleccionando una opción para cada criterio.');
                return;
            }else{
                let resultadoPromedio = (totalPuntaje / 11).toFixed(2);
                let resultado = '';
                if(totalPuntaje <= 10){
                    resultado = 'Deficiente';
                }else if (totalPuntaje <= 13){
                    resultado = 'Regular';
                }else if (totalPuntaje <= 16){
                    resultado = 'Bueno';
                }else if (totalPuntaje <= 19){
                    resultado = 'Muy Bueno';
                }else if (totalPuntaje >=20){
                    resultado = 'Excelente';
                    totalPuntaje = 20;
                }
                $('#resultadoObservacion').val(resultado);
                $('#puntajeObtenido').val(totalPuntaje);

            }

        });


        $('#btnRegistrarEvaluacion').click(function() {
            // VALIDACIONES FRONTEND
            var errores = [];
            
            // Validar datos académicos
            if (!$('#select2Periodos').val()) errores.push('Debe seleccionar un periodo');
            if (!$('#select2Facultades').val()) errores.push('Debe seleccionar una facultad');
            if (!$('#select2Programas').val()) errores.push('Debe seleccionar un programa académico');
            if (!$('#select2Cursos').val()) errores.push('Debe seleccionar un curso');
            if (!$('#select2Docentes').val()) errores.push('Debe seleccionar un docente');
            
            // Validar datos de sesión
            if (!$('#select2Semana').val()) errores.push('Debe seleccionar una semana');
            if (!$('#temaSesion').val().trim()) errores.push('Debe ingresar el tema de la sesión');
            
            // Validar que se haya calculado la nota
            if (!$('#puntajeObtenido').val()) errores.push('Debe calcular la nota antes de registrar');
                        
            // Mostrar errores si existen
            if (errores.length > 0) {
                GS.modalAdvertencia('Por favor completar todos los campos requeridos.');
                return;
            }
            
            // Confirmación antes de guardar
            GS.modalConfirmacion(
                '¿Confirmar registro?',
                'Se registrará la evaluación docente. Esta acción no se puede revertir.',
                function() {
                    // Preparar datos para envío
                    var formData = {
                        periodo: $('#select2Periodos').val(),
                        facultad: $('#select2Facultades').val(),
                        programa_academico: $('#select2Programas').val(),
                        curso_codigo: $('#select2Cursos').val(),
                        curso_nombre: $('#select2Cursos option:selected').data('nombre'),
                        docente_dni: $('#select2Docentes').val(),
                        docente_nombre: $('#select2Docentes option:selected').data('nombre'),
                        semana: $('#select2Semana').val(),
                        tema: $('#temaSesion').val().trim(),
                        inicio1: $('input[name="inicio1"]:checked').val() || null,
                        inicio2: $('input[name="inicio2"]:checked').val() || null,
                        inicio3: $('input[name="inicio3"]:checked').val() || null,
                        desarrollo1: $('input[name="desarrollo1"]:checked').val() || null,
                        desarrollo2: $('input[name="desarrollo2"]:checked').val() || null,
                        desarrollo3: $('input[name="desarrollo3"]:checked').val() || null,
                        desarrollo4: $('input[name="desarrollo4"]:checked').val() || null,
                        cierre1: $('input[name="cierre1"]:checked').val() || null,
                        cierre2: $('input[name="cierre2"]:checked').val() || null,
                        cierre3: $('input[name="cierre3"]:checked').val() || null,
                        otros: $('input[name="otros"]:checked').val() || null,
                        total: $('#puntajeObtenido').val(),
                        plan_mejora: $('#planMejora').summernote('code').trim() || null
                    };
                    
                    GS.inicioSolicitud();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('docente.evaluacion.registrar-evaluacion') }}",
                        data: formData,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            GS.finSolicitud();
                            if (response.status === 200) {
                                GS.modalCorrecto(response.message);
                                // Opcional: Limpiar formulario o redirigir
                                // location.reload();
                            } else {
                                GS.modalAdvertencia(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            GS.finSolicitud();
                            let mensaje = 'Error al registrar la evaluación';
                            
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                mensaje = xhr.responseJSON.message;
                            } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                                let erroresBackend = [];
                                for (let campo in xhr.responseJSON.errors) {
                                    erroresBackend.push(xhr.responseJSON.errors[campo].join(', '));
                                }
                                mensaje = 'Errores de validación:\\n• ' + erroresBackend.join('\\n• ');
                            }
                            
                            GS.modalError(mensaje);
                        }
                    });
                }
            );
        });


        $('#btnExportarPDF').click(function() {
            // VALIDACIONES FRONTEND
            var errores = [];
            
            // Validar datos académicos
            if (!$('#select2Periodos').val()) errores.push('Debe seleccionar un periodo');
            if (!$('#select2Facultades').val()) errores.push('Debe seleccionar una facultad');
            if (!$('#select2Programas').val()) errores.push('Debe seleccionar un programa académico');
            if (!$('#select2Cursos').val()) errores.push('Debe seleccionar un curso');
            if (!$('#select2Docentes').val()) errores.push('Debe seleccionar un docente');
            
            // Validar datos de sesión
            if (!$('#select2Semana').val()) errores.push('Debe seleccionar una semana');
            if (!$('#temaSesion').val().trim()) errores.push('Debe ingresar el tema de la sesión');
            
            // Validar que se haya calculado la nota
            if (!$('#puntajeObtenido').val()) errores.push('Debe calcular la nota antes de exportar el PDF');
                        
            // Mostrar errores si existen
            if (errores.length > 0) {
                GS.modalAdvertencia('Por favor completar todos los campos requeridos.');
                return;
            }
            
            // Preparar datos para envío
            var formData = {
                periodo: $('#select2Periodos').val(),
                facultad: $('#select2Facultades').val(),
                programa_academico: $('#select2Programas').val(),
                curso_codigo: $('#select2Cursos').val(),
                docente_dni: $('#select2Docentes').val(),
                semana: $('#select2Semana').val()
            };


            GS.inicioSolicitud();
            $.ajax({
                url: '{{ route("docente.evaluacion.pdf") }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    GS.finSolicitud();
                    if (response.status === 200) {
                        GS.modalCorrecto(response.message);
                        var blob = GS.b64toBlob(response.data.pdf, 'application/pdf');
                        var blobUrl = URL.createObjectURL(blob);
                        window.open(blobUrl);                        
                    } else {
                        GS.modalAdvertencia(response.message);
                    }
                },
                error: function(xhr) {
                    GS.finSolicitud();  
                    GS.modalError('Error al generar el PDF');
                }
            });
        });
    });







</script>


@endsection
