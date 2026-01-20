@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h4 class="card-title mb-2 mb-md-0">Gestión de Permisos</h4>

                <!-- Buscador y breadcrumb -->
                <div class="d-flex flex-column flex-md-row gap-2 align-items-start align-items-md-center">
                    <!-- Input de búsqueda -->
                    <div class="d-flex gap-2 mb-2 mb-md-0">
                        <input type="text" class="form-control" id="palabra" placeholder="Buscar permiso...">
                        <button class="btn btn-info" id="btnBuscar">Buscar</button>
                    </div>

                </div>
            </div>

            <div class="card-body">
                
                <div id="cardPermisos" style="display: none;">
                    <div class="card border shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Lista de permisos</h5>
                            <input type="hidden" id="id" value="">
                        </div>
                        <div class="card-body">
                            <div class="row" id="listaPermisos"></div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-success" id="btnGuardar">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



       
@endsection



@section('script')
<script>
    $(document).ready(function () {
        $('#btnBuscar').click(function () {
            let formData = new FormData();

            formData.append('palabra', $('#palabra').val());

            GS.inicioSolicitud();
            $.ajax({
                url: `{{route('admin.usuarios.permisos.buscar')}}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    GS.finSolicitud();
                    if (response.status === 200) {
                        $('#cardPermisos').css('display','block');
                        $('#listaPermisos').html('');
                        $('#listaPermisos').html(response.data.html);
                        $('#id').val(response.data.id);
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                        }).showToast();
                        $('#modal-agregarUsuario').modal('hide');

                    } else {
                        $('#cardPermisos').css('display','none');
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)"
                        }).showToast();

                    }
                },
                error: function (error) {
                    $('#cardPermisos').css('display','none');
                    GS.finSolicitud();
                    Toastify({
                        text: "Error de conexión",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)"
                    }).showToast();
                }
            });
        });

        $('#btnGuardar').on('click', function() {
            let permisosMarcados = [];
            $('input[name="items[]"]:checked').each(function() {
                let itemId = $(this).attr('id').replace('item_', '');
                permisosMarcados.push(itemId);
            });
                GS.inicioSolicitud();
            $.ajax({
                url: `{{route('admin.usuarios.permisos.guardar')}}`,
                type: 'POST',
                data: {
                    permisos: permisosMarcados,
                    id: $('#id').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    GS.finSolicitud();
                    if (response.success) {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                        }).showToast();

                    } else {
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)"
                        }).showToast();

                    }
                },
                error: function(xhr) {
                    GS.finSolicitud();
                    Toastify({
                        text: "Error del servidor",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)"
                    }).showToast();
                }
            });
        });

    });
    </script>

@endsection

