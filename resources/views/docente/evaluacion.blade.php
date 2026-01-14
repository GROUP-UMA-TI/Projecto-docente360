@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Evaluación Docente</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="#">
                    @csrf

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label">Seleccionar Periodo</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                    <option>2024-I</option>
                                    <option>2024-II</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Seleccionar Facultad</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Programa Académico / Especialidad</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Curso</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Docente</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Evaluador</label>
                                <input type="text" class="form-control" placeholder="Nombre del evaluador">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Semana</label>
                                <select class="form-select">
                                    <option selected disabled>Seleccione...</option>
                                    <option>Semana 1</option>
                                    <option>Semana 2</option>
                                    <option>Semana 3</option>
                                    <option>Semana 4</option>
                                    <option>Semana 5</option>
                                    <option>Semana 6</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tema de la Sesión</label>
                                <input type="text" class="form-control" placeholder="Tema desarrollado">
                            </div>

                        </div>


                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label">Resultado de la Observación</label>
                                <input type="text" class="form-control" value="Deficiente" disabled>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Puntaje Obtenido</label>
                                <input type="number" class="form-control" placeholder="Ej: 18">
                            </div>

                            <hr>

                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn btn-secondary">
                                    <i class="mdi mdi-file-pdf-outline"></i> Exportar PDF
                                </button>

                                <button type="button" class="btn btn-warning">
                                    <i class="mdi mdi-calculator"></i> Calcular Nota
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save"></i> Registrar Evaluación
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



                        



@endsection

@section('script')

@endsection