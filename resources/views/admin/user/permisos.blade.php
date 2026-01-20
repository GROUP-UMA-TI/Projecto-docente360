@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.11.2/toastify.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.11.2/toastify.min.js"></script>
@endsection
@section('content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <div class="d-flex">
                    <input type="text" class="col-4 form-control mr-3" id="palabra">
                    <button class="col-4 btn btn-info" id="btnBuscar">Buscar</button>
                </div>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Permisos</a></li>
            </ol>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6" id="cardPermisos" style="display: none">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de permisos</h4>
                <input type="hidden" id="id" value="">
            </div>
            <div class="card-body"  >
                <div class="row" id="listaPermisos">

                </div>
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
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
                url: '{{route('admin.usuarios.permisos.guardar')}}',
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

