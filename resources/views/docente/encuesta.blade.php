@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Encuesta</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="pregunta">Pregunta</label>
                <input type="text" class="form-control" id="pregunta" name="pregunta" required>
            </div>
            <div class="form-group">
                <label for="respuesta">Respuesta</label>
                <textarea class="form-control" id="respuesta" name="respuesta" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

@endsection




@section('scripts')



@endsection
