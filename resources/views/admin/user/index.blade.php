@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h4 class="card-title"> Gestión de Usuarios </h4>
                <button type="button" class="btn btn-secondary btnAdd" > <i class="ti ti-user-plus"></i> Agregar Usuario</button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped" style="width:100%" data-tables="tablaUsuarios">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>                                
                                <th>Nombres</th>
                                <th>Genero</th>
                                <th>Email</th>
                                <th>Grado</th>
                                <th>Estado</th>
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

                                <div id="modal-agregarUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-agregarUsuarioLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modal-agregarUsuarioLabel"><i class="ti ti-user-plus"></i> Agregar Usuario</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    @csrf
                                                    <input type="hidden" class="form-control" id="id">
                                                    
                                                    <!-- Información Personal -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Nombres <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="name" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lastname" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="lastname" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="genero" class="form-label">Género <span class="text-danger">*</span></label>
                                                            <select class="form-select" id="genero" required>
                                                                <option value="" selected disabled>Seleccionar...</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" id="email" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="grado" class="form-label">Grado</label>
                                                            <input type="text" class="form-control" id="grado">
                                                        </div>
                                                    </div>

                                                    <!-- Configuración de Cuenta -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control" id="password" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                                                            <select class="form-select" id="estado" required>
                                                                <option value="" selected disabled>Seleccionar...</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Firma -->
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <label for="firma" class="form-label">Firma Digital</label>
                                                            <input type="file" id="firma" name="firma" class="form-control" accept="image/*">
                                                            <div class="form-text">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
                                                        </div>
                                                    </div>

                                                    <!-- Vista previa de la firma -->
                                                    <div class="row mb-3" id="divFirma" style="display: none;">
                                                        <div class="col-12">
                                                            <label class="form-label">Vista previa:</label>
                                                            <div class="border rounded p-3 text-center bg-light">
                                                                <img id="previewFirma" src="" alt="Preview" style="max-width: 200px; max-height: 100px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="ti ti-cancel me-1"></i>Cancelar
                                                </button>
                                                <button type="button" class="btn btn-secondary btnGuardarUsuario">
                                                    <i class="ti ti-device-floppy me-1"></i>Guardar Usuario
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="modal-editarUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-editarUsuarioLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modal-editarUsuarioLabel"><i class="ti ti-user-edit"></i> Editar Usuario</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    @csrf
                                                    <input type="hidden" class="form-control" id="idG">
                                                    
                                                    <!-- Información Personal -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="nameG" class="form-label">Nombres <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="nameG" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lastnameG" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="lastnameG" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="generoG" class="form-label">Género <span class="text-danger">*</span></label>
                                                            <select class="form-select" id="generoG" required>
                                                                <option value="" selected disabled>Seleccionar...</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="emailG" class="form-label">Email <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" id="emailG" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="gradoG" class="form-label">Grado</label>
                                                            <input type="text" class="form-control" id="gradoG">
                                                        </div>
                                                    </div>

                                                    <!-- Configuración de Cuenta -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="passwordG" class="form-label">Nueva Contraseña</label>
                                                            <input type="password" class="form-control" id="passwordG" placeholder="Dejar vacío para mantener la actual">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="estadoG" class="form-label">Estado <span class="text-danger">*</span></label>
                                                            <select class="form-select" id="estadoG" required>
                                                                <option value="" selected disabled>Seleccionar...</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Firma Actual y Nueva -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Firma Actual</label>
                                                            <div id="divFirmaG" class="border rounded p-3 text-center bg-light" style="min-height: 120px;">
                                                                <span class="text-muted">Sin firma registrada</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="firmaG" class="form-label">Nueva Firma Digital</label>
                                                            <input type="file" id="firmaG" name="firmaG" class="form-control" accept="image/*">
                                                            <div class="form-text">Formatos: JPG, PNG, GIF. Máximo: 2MB</div>
                                                            
                                                            <!-- Vista previa de nueva firma -->
                                                            <div id="previewFirmaG" style="display: none;" class="mt-2">
                                                                <div class="border rounded p-2 text-center bg-light">
                                                                    <img id="imgPreviewG" src="" alt="Preview" style="max-width: 200px; max-height: 100px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="ti ti-cancel me-1"></i>Cancelar
                                                </button>
                                                <button type="button" class="btn btn-secondary btnActualizarUsuario">
                                                    <i class="ti ti-device-floppy me-1"></i>Actualizar Usuario
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


@endsection



@section('script')

<script>

    $(document).ready(function () {
        let tablaUsuarios = $('[data-tables="tablaUsuarios"]').DataTable({
            language: {
                url: "{{ asset('assets/plugins/datatables/Spanish.json') }}",
                paginate: {
                    first: '<i class="ti ti-chevrons-left"></i>',   // Tabler First
                    previous: '<i class="ti ti-chevron-left"></i>', // Tabler Prev
                    next: '<i class="ti ti-chevron-right"></i>',    // Tabler Next
                    last: '<i class="ti ti-chevrons-right"></i>'    // Tabler Last
                }
            },
                "ajax": "{{ route('admin.usuarios.lista') }}",
                columns: [
                    { data: "nombres" },
                    { data: "genero" },
                    { data: "email" },
                    { data: "grado" },
                    { data: "estado" },
                    {
                        data: "id",
                        render: function (data, type, row) {
                            return `
                                <button type="button" class="btn btn-info btn-sm btnEdit" data-id="${row.id}">
                                    Editar
                                </button>
                            `;
                        }
                    }
                ]

        });

        

         $('[data-tables="tablaUsuarios"]').on('click', '.btnEdit', function () {
            let data = {
                id : $(this).data('id'),
            };
            GS.inicioSolicitud();
            $.ajax({
                url: `{{route('admin.usuarios.get-usuario')}}`,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    GS.finSolicitud();
                    if (response.status === 200) {
                        let user = response.data;
                        $('#idG').val(user.id);
                        $('#nameG').val(user.name);
                        $('#lastnameG').val(user.lastname);
                        $('#generoG').val(user.genero).change();
                        $('#emailG').val(user.email);
                        $('#gradoG').val(user.grado);
                        
                        // Manejar firma - verificar si existe
                        if (user.firma) {
                            $('#divFirmaG').html('<img src="' + user.firma + '" alt="Firma del usuario" class="img-fluid" style="max-width: 200px; border: 1px solid #ddd; border-radius: 4px;"/>');
                        } else {
                            $('#divFirmaG').html('<p class="text-muted"><i class="ti ti-photo-off"></i> Sin firma registrada</p>');
                        }
                        
                        $('#estadoG').val(user.status.toString()).change();
                        $('#modal-editarUsuario').modal('show');

                    } else {

                        GS.modalError('Error', response.message);
                    }
                },
                error: function (error) {
                    GS.finSolicitud();
                    GS.modalError('Error', 'Ocurrió un error');
                }
            });
        });        


        $('.btnActualizarUsuario').on('click', function () {
            let formData = new FormData();

            formData.append('id', $('#idG').val());
            formData.append('name', $('#nameG').val());
            formData.append('lastname', $('#lastnameG').val());
            formData.append('genero', $('#generoG').val());
            formData.append('email', $('#emailG').val());
            formData.append('grado', $('#gradoG').val());
            formData.append('status', $('#estadoG').val());
            formData.append('password', $('#passwordG').val());
            // verificar si existe antes una firma
            let firmaG = $('#firmaG')[0].files[0];
            if (firmaG) {
                formData.append('firma', firmaG);
            }

            GS.inicioSolicitud();
            $.ajax({
                url: `{{route('admin.usuarios.crear-editar')}}`,
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
                        GS.modalCorrecto('Éxito', response.message);
                        tablaUsuarios.ajax.reload();
                        $('#modal-editarUsuario').modal('hide');
                    } else {
                        GS.modalError('Error', response.message);
                    }
                },
                error: function (error) {
                    GS.finSolicitud();
                    GS.modalError('Error', 'Ocurrió un error');
                }
            });
        });


        $('.btnGuardarUsuario').click(function () {
            let formData = new FormData();

            formData.append('name', $('#name').val());
            formData.append('lastname', $('#lastname').val());
            formData.append('genero', $('#genero').val());
            formData.append('email', $('#email').val());
            formData.append('grado', $('#grado').val());
            formData.append('status', $('#estado').val());
            formData.append('password', $('#password').val());
            let firma = $('#firma')[0].files[0];
            if (firma) {
                formData.append('firma', firma);
            }

            GS.inicioSolicitud();
            $.ajax({
                url: `{{route('admin.usuarios.crear-editar')}}`,
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
                        GS.modalCorrecto('Éxito', response.message);
                        tablaUsuarios.ajax.reload();
                        $('#modal-agregarUsuario').modal('hide');
                    } else {
                        GS.modalError('Error', response.message);
                    }
                },
                error: function (error) {
                    GS.finSolicitud();
                    GS.modalError('Error', 'Ocurrió un error');
                }
            });
        });


        $('.btnAdd').click(function () {
            $('#modal-agregarUsuario').modal('show');
            $('#id').val('');
            $('#name').val('');
            $('#lastname').val('');
            $('#genero').val('');
            $('#email').val('');
            $('#grado').val('');
            $('#estado').val('');
            $('#password').val('');
            $('#firma').val('');
        });


    

    });

       

 
       

   
</script>

@endsection