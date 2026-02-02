@extends('layouts.app')

@section('content')
     <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4 class="card-title"> HISTORIAL DE EVALUACIÓN </h4>
                            </div>

                            <div class="card-body">                             
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width:100%" data-table="historial-evaluacion">
                                        <thead class="align-middle thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th>Periodo</th>
                                                <th>Facultad</th>
                                                <th>Programa Académico</th>
                                                <th>Docente</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                       
        </div>
    </div>







@endsection

@section('script')

<script>
$(function () {

    const table = $('table[data-table="historial-evaluacion"]').DataTable({
        "aProcessing":true,
        "aServerSide":true,       
        language: {
            url: "{{ asset('assets/plugins/datatables/Spanish.json') }}",
            paginate: {
                first: '<i class="ti ti-chevrons-left"></i>',
                last: '<i class="ti ti-chevrons-right"></i>',
                next: '<i class="ti ti-chevron-right"></i>',
                previous: '<i class="ti ti-chevron-left"></i>'
            }
        },
        ajax: "{{ route('director.evaluacion.historial.lista') }}",
        columns: [
            {data: 'periodo'},
            {data: 'facultad'},
            {data: 'programa_academico'},
            {data: 'nombre_docente'},
            {data: 'btn_acciones', orderable: false, searchable: false},
        ],
        "responsive" : true,
        "bDestroy": true,
        "order":[[0,"desc"]]
    });

    // EVENTO PARA DESCARGAR PDF
    $(document).on('click', '.btn-DescargarPdf', function() {
        const evaluacionId = $(this).data('id');
        
        GS.inicioSolicitud();
        $.ajax({
            url: "{{ route('director.evaluacion.pdf') }}",
            type: 'POST',
            data: {
                id: evaluacionId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                GS.finSolicitud();
                if(response.status === 200) {
                    var blob = GS.base64ToBlob(response.data.pdf, 'application/pdf');
                    var blobUrl = URL.createObjectURL(blob);
                    window.open(blobUrl);
                    GS.modalCorrecto(response.message);
                } else {
                    GS.modalError(response.message);
                }
            },
            error: function() {
                GS.finSolicitud();
                GS.modalError('Error al generar el PDF');
            }
        });
    });

});
</script>


@endsection
