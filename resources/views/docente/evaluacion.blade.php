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
                <form method="POST" action="#">
                    @csrf
                    <div class="row g-4">

                        <!-- COLUMNA IZQUIERDA -->
                        <div class="col-md-6">

                            <!-- CONTEXTO ACADÉMICO -->
                            <h6 class="mb-3 text-secondary">Contexto Académico</h6>

                            <div class="mb-3">
                                <label class="form-label">Periodo Académico</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccionar periodo</option>
                                    <option>Periodo 1</option>
                                    <option>Periodo 2</option>
                                    <option>Periodo 3</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Facultad</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccionar facultad</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Programa / Especialidad</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccionar programa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Curso</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccionar curso</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Docente</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccionar docente</option>
                                </select>
                            </div>

                        </div>

                        <!-- COLUMNA DERECHA -->
                        <div class="col-md-6">

                            <!-- DATOS DE LA SESIÓN -->
                            <h6 class="mb-3 text-secondary">Datos de la Sesión</h6>

                            <div class="mb-3">
                                <label class="form-label">Evaluador</label>
                                <input type="text" class="form-control" placeholder="Nombre del evaluador">
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Semana</label>
                                    <select class="form-select">
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
                                    <input type="text" class="form-control" placeholder="Tema desarrollado">
                                </div>
                            </div>

                            <!-- RESULTADO -->
                            <h6 class="mb-3 text-secondary">Resultado de la Evaluación</h6>
                            
                            <div class="row g-3">
                                <div class="col-md-7">
                                    <label class="form-label">Resultado</label>
                                    <input type="text" class="form-control" value="Excelente" readonly>
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label">Puntaje</label>
                                    <input type="number" class="form-control" value="20" readonly>
                                </div>
                            </div>
                            <!-- ACCIONES -->
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" class="btn btn-outline-success">
                                    Exportar PDF
                                </button>
                                <button type="button" class="btn btn-warning">
                                    Calcular Nota
                                </button>
                                <button type="submit" class="btn btn-info">
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




@endsection