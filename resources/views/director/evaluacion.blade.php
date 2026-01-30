@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">EVALUACIÓN DIRECTOR</h5>
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
                                <th>Competencias</th>
                                <th>Criterio</th>
                                <th>Indicador</th>
                                <th>Siempre</th>
                                <th>Casi siempre</th>
                                <th>Normalmente</th>
                                <th>Algunas veces</th>
                                <th>Nunca</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- COMPETENCIAS PEDAGÓGICAS -->
                            <tr>
                                <td>Competencias pedagógicas</td>
                                <td>Planificación</td>
                                <td>
                                    El docente comunica al coordinador de manera oportuna las mejoras que considera necesarias en el sílabo del curso, tales como ajustes en la bibliografía, organización de los contenidos, estrategias pedagógicas y criterios de evaluación. 
                                    <i class="ti ti-info-circle fs-3 criteria-icon text-primary"
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    data-bs-title="
                                    <div><strong>SIEMPRE (5):</strong> El docente comunica al coordinador de manera oportuna las mejoras necesarias en el sílabo del curso, tales como ajustes en la bibliografía, organización de los contenidos, estrategias pedagógicas y criterios de evaluación.</div><br>
                                    <div><strong>CASI SIEMPRE (4):</strong> El docente comunica con cierto retraso las mejoras en el sílabo o de manera parcial.</div><br>
                                    <div><strong>NORMALMENTE (3):</strong> El docente comunica algunas mejoras, pero de manera esporádica.</div><br>
                                    <div><strong>ALGUNAS VECES (2):</strong> El docente rara vez comunica mejoras en el sílabo o planificación.</div><br>
                                    <div><strong>NUNCA (0):</strong> El docente no comunica ninguna mejora en el sílabo o planificación.</div>
                                    ">
                                    </i>
                                </td>
                                <td><input type="radio" class="form-check-input" name="planificacion" value="5"></td>
                                <td><input type="radio" class="form-check-input" name="planificacion" value="4"></td>
                                <td><input type="radio" class="form-check-input" name="planificacion" value="3"></td>
                                <td><input type="radio" class="form-check-input" name="planificacion" value="2"></td>
                                <td><input type="radio" class="form-check-input" name="planificacion" value="0"></td>
                            </tr>

                            <tr>
                                <td>Competencias pedagógicas</td>
                                <td>Evaluación</td>
                                <td>
                                    A lo largo del periodo académico, y en base a los resultados obtenidos en las evaluaciones, el docente participa activamente en la implementación de rutas de acción que busquen mejorar el rendimiento académico de los estudiantes, siempre orientadas al logro de los resultados de aprendizaje establecidos. 
                                    <i class="ti ti-info-circle fs-3 criteria-icon text-primary"
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    data-bs-title="
                                    <div><strong>SIEMPRE (5):</strong> El docente presenta propuestas que contribuyen al logro de los objetivos de la coordinación, integrándose de manera activa en los grupos de trabajo. Además, participa en las actividades organizadas por su área y en los eventos organizados por la universidad.</div><br>
                                    <div><strong>CASI SIEMPRE (4):</strong> El docente presenta propuestas y participa activamente, aunque de forma menos frecuente.</div><br>
                                    <div><strong>NORMALMENTE (3):</strong> El docente presenta algunas propuestas y participa, pero no de forma regular.</div><br>
                                    <div><strong>ALGUNAS VECES (2):</strong> El docente presenta pocas propuestas y rara vez participa en las actividades de su área.</div><br>
                                    <div><strong>NUNCA (0):</strong> El docente no presenta propuestas ni participa en las actividades organizadas.</div>
                                    ">
                                    </i>
                                </td>
                                <td><input type="radio" class="form-check-input" name="evaluacion" value="5"></td>
                                <td><input type="radio" class="form-check-input" name="evaluacion" value="4"></td>
                                <td><input type="radio" class="form-check-input" name="evaluacion" value="3"></td>
                                <td><input type="radio" class="form-check-input" name="evaluacion" value="2"></td>
                                <td><input type="radio" class="form-check-input" name="evaluacion" value="0"></td>
                            </tr>

                            <!-- COMPETENCIAS CONDUCTUALES -->
                            <tr>
                                <td>Competencias conductuales</td>
                                <td>Innovación y trabajo en equipo</td>
                                <td>
                                    El docente presenta propuestas innovadoras que contribuyen al logro de los objetivos de la coordinación, integrándose activamente en los grupos de trabajo y proponiendo soluciones que mejoren los procesos. 
                                    <i class="ti ti-info-circle fs-3 criteria-icon text-primary"
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    data-bs-title="
                                    <div><strong>SIEMPRE (5):</strong> El docente siempre presenta propuestas innovadoras, se integra activamente en los grupos de trabajo, y promueve soluciones efectivas de manera consistente. Participa en todas las actividades y eventos organizados.</div><br>
                                    <div><strong>CASI SIEMPRE (4):</strong> El docente presenta propuestas innovadoras y participa activamente, aunque con algunas excepciones. Está involucrado en la mayoría de las actividades y eventos organizados.</div><br>
                                    <div><strong>NORMALMENTE (3):</strong> El docente presenta algunas propuestas innovadoras y participa en los grupos de trabajo, pero no de manera regular. Su participación en actividades y eventos es esporádica.</div><br>
                                    <div><strong>ALGUNAS VECES (2):</strong> El docente presenta algunas propuestas, pero con poca frecuencia. Participa ocasionalmente en grupos de trabajo y en eventos organizados.</div><br>
                                    <div><strong>NUNCA (0):</strong> El docente no presenta propuestas innovadoras ni participa activamente en los grupos de trabajo. No participa en las actividades ni eventos organizados.</div>
                                    ">
                                    </i>
                                </td>
                                <td><input type="radio" class="form-check-input" name="innovacion" value="5"></td>
                                <td><input type="radio" class="form-check-input" name="innovacion" value="4"></td>
                                <td><input type="radio" class="form-check-input" name="innovacion" value="3"></td>
                                <td><input type="radio" class="form-check-input" name="innovacion" value="2"></td>
                                <td><input type="radio" class="form-check-input" name="innovacion" value="0"></td>
                            </tr>

                            <tr>
                                <td>Competencias conductuales</td>
                                <td>Responsabilidad y compromiso</td>
                                <td>
                                    El docente cumple responsablemente sus tareas y compromisos para la implementación del aprendizaje experiencial, la inteligencia artificial y el desarrollo de una mentalidad emprendedora. Participa activamente en capacitaciones y actividades de formación profesional. 
                                    <i class="ti ti-info-circle fs-3 criteria-icon text-primary"
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    data-bs-title="
                                    <div><strong>SIEMPRE (5):</strong> El docente asume todas sus responsabilidades con alto nivel de compromiso, mostrando constantemente una actitud proactiva, la implementación del aprendizaje experiencial, la inteligencia artificial y la mentalidad emprendedora. Participa activamente en capacitaciones y actividades de desarrollo profesional de manera frecuente y continua.</div><br>
                                    <div><strong>CASI SIEMPRE (4):</strong> El docente cumple la mayoría de sus responsabilidades y generalmente implementa el aprendizaje experiencial, incorpora inteligencia artificial y fomenta una mentalidad emprendedora, aunque con algunas áreas menores por mejorar. Participa regularmente en cursos de capacitación y desarrollo profesional.</div><br>
                                    <div><strong>NORMALMENTE (3):</strong> El docente cumple regularmente sus responsabilidades, implementando de manera básica el aprendizaje experiencial, la inteligencia artificial y la promoción de una mentalidad emprendedora, aunque su aplicación podría ser más constante. Su participación en capacitaciones es ocasional.</div><br>
                                    <div><strong>ALGUNAS VECES (2):</strong> El docente cumple mínimamente sus responsabilidades, mostrando poca frecuencia en la implementación del aprendizaje experiencial, inteligencia artificial y el fomento de la mentalidad emprendedora. Participa en pocas ocasiones en capacitaciones y actividades de desarrollo profesional.</div><br>
                                    <div><strong>NUNCA (0):</strong> El docente no cumple con sus responsabilidades y no implementa en absoluto el aprendizaje experiencial, la inteligencia artificial, ni promueve una mentalidad emprendedora. No participa en actividades de capacitación o desarrollo profesional.</div>
                                    ">
                                    </i>
                                </td>
                                <td><input type="radio" class="form-check-input" name="responsabilidad" value="5"></td>
                                <td><input type="radio" class="form-check-input" name="responsabilidad" value="4"></td>
                                <td><input type="radio" class="form-check-input" name="responsabilidad" value="3"></td>
                                <td><input type="radio" class="form-check-input" name="responsabilidad" value="2"></td>
                                <td><input type="radio" class="form-check-input" name="responsabilidad" value="0"></td>
                            </tr>

                            <!-- PLAN DE MEJORA -->
                            <tr>
                                <td colspan="8">
                                <p><strong>PLAN DE MEJORA:</strong> </p>
                                    <div class="summernote" id="planMejora">

                                    </div>

                                <div style="width: 350px; margin: 0 auto; text-align: center;padding-top: 30px;">
                                    <p><b><span>Realizado por:</span></b></p>
                                    <div style="display: inline-block;">

                                        <p style="margin: 0; line-height: 1.3;">{{Auth::user()->grado .' '.Auth::user()->name .' '. Auth::user()->lastname}} </p>
                                        <p style="margin: 0; line-height: 1.3;">Docente evaluador </p>
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
            $('#select2Docentes').empty().append('<option value="">Seleccionar docente</option>');
            
            if (n_codper && c_codfac && c_codesp) {
                GS.inicioSolicitud();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('director.evaluacion.lista-docente-codesp') }}",
                    data: { n_codper, c_codfac },
                    dataType: 'json',
                    success: function(response) {
                        GS.finSolicitud();
                        if (response.status == 200) {
                            const lista = response.data.filter(doc => doc.c_codesp === c_codesp);
                            if (lista.length > 0) {
                                $.each(lista, function(index, d) {                                    
                                    $('#select2Docentes').append('<option value="' + d.c_dnidoc + '" data-nombre="' + d.nombres + '">' + d.nombres + '</option>');
                                });
                            } else {
                                $('#select2Docentes').append('<option value="" disabled>No hay docentes disponibles</option>');
                            }
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

        $('#btnCalcularNota').click(function () {
            const grupos = ['planificacion', 'evaluacion', 'innovacion', 'responsabilidad'];
            let puntajeTotal = 0;
            let completo = true;

            grupos.forEach(grupo => {
                const valor = $(`input[name="${grupo}"]:checked`).val();
                if (valor) {
                    puntajeTotal += parseInt(valor);
                } else {
                    completo = false;
                }
            });

            if (!completo) {
                GS.modalAdvertencia('Por favor, complete todas las evaluaciones antes de calcular la nota.');
                return;
            }

            // Clasificación según puntaje
            let resultado = '';
            if (puntajeTotal <= 10) resultado = 'Deficiente';
            else if (puntajeTotal <= 13) resultado = 'Regular';
            else if (puntajeTotal <= 16) resultado = 'Bueno';
            else if (puntajeTotal <= 19) resultado = 'Muy Bueno';
            else resultado = 'Excelente';

            $('#puntajeObtenido').val(puntajeTotal);
            $('#resultadoObservacion').val(resultado);
        });

        $('#btnRegistrarEvaluacion').click(function () {
            
            let errores = [];

            if (!$('#select2Periodos').val()) {
                errores.push('Seleccione un periodo académico.');
            }
            
            if (!$('#select2Programas').val()) {
                errores.push('Seleccione un programa académico.');
            }

            if (!$('#select2Facultades').val()) {
                errores.push('Seleccione una facultad.');
            }

            if (!$('#select2Docentes').val()) {
                errores.push('Seleccione un docente.');
            }
            if (!$('#puntajeObtenido').val()) {
                errores.push('Calcule el puntaje obtenido.');
            }

            if (errores.length > 0) {
                GS.modalAdvertencia("Debe completar todos los campos requeridos.");
                return;
            }

            GS.modalConfirmacion(
                '¿Confirmar registro?',
                'Se registrará la evaluación docente.',
                function() {
                    const data = {
                        periodo: $('#select2Periodos').val(),
                        facultad: $('#select2Facultades').val(),
                        programa_academico: $('#select2Programas').val(),
                        docente_dni: $('#select2Docentes').val(),
                        nombre_docente: $('#select2Docentes option:selected').data('nombre'),                        
                        planificacion: $('input[name="planificacion"]:checked').val(),
                        evaluacion: $('input[name="evaluacion"]:checked').val(),
                        innovacion: $('input[name="innovacion"]:checked').val(),
                        responsabilidad: $('input[name="responsabilidad"]:checked').val(),
                        plan_mejora: $('#planMejora').summernote('code').trim() || null,
                        puntaje_obtenido: $('#puntajeObtenido').val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('director.evaluacion.registrar') }}",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                GS.modalCorrecto(response.message);
                            } else {
                                GS.modalError(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            GS.modalError('Error en la solicitud AJAX', error);
                        }
                    });
                }

            );

        });






        
    });







</script>


@endsection
