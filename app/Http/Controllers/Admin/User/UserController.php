<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Modulo;
use App\Models\SubModulo;
use App\Models\Item;
use App\Models\Permission;
use App\Helpers\Encryption;
use App\Helpers\Service;
use App\Helpers\Util;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function serviceListaUsuarios()
    {

       try {
             $users = User::select('id', 'name', 'lastname', 'genero', 'email', 'grado', 'status')
                ->get()
                ->map(function ($user) {
                    return [
                        'id' => Encryption::encriptar($user->id),
                        'nombres' => $user->name . ' ' . $user->lastname,
                        'genero' => Util::getGenero($user->genero),
                        'email' => $user->email,
                        'grado' => $user->grado,
                        'estado' => Util::getEstado($user->status),
                    ];
                });
        return response()->json(Service::responseSuccess('Lista de usuarios obtenida con éxito', $users));
        } catch (Exception $e) {
            return response()->json(Service::responseError('Error al obtener la lista de usuarios: ' . $e->getMessage()));
        }
        
    }

    public function serviceGetUsuario(Request $request)
    {
        try {
            $usuario = User::find(Encryption::desencriptar($request->id));
            if (!$usuario) {
                return response()->json(Service::responseError('Usuario no encontrado'));
            }

            $data = [
                'id' => Encryption::encriptar($usuario->id),
                'name' => $usuario->name,
                'lastname' => $usuario->lastname,
                'genero' => $usuario->genero,
                'email' => $usuario->email,
                'firma' => $usuario->firma ? Storage::url($usuario->firma) : null,
                'grado' => $usuario->grado,
                'status' => $usuario->status,
            ];

            return response()->json(Service::responseSuccess('Usuario obtenido con éxito', $data));
        } catch (Exception $e) {
            return response()->json(Service::responseError('Error al obtener el usuario: ' . $e->getMessage()));
        }
    }

    public function crear_editarUsuario(Request $request)
    {
        if($request->id == ''){
            try {
                $user = new User;
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->genero = $request->genero;
                $user->email = $request->email;
                if($request->hasFile('firma')) {
                   $file = $request->file('firma');
                   if ($file->isValid()) {
                       $path = $file->store('signatures', 'public');// Guarda en storage/app/public/signatures
                       $user->firma = $path;
                   }else{
                       return response()->json(Service::responseError('Archivo de firma no válido'));
                   }

                }
                $user->grado = $request->grado;
                $user->status = $request->status;
                $user->password = Hash::make($request->password);
                $user->save();

                return response()->json(Service::responseSuccess('Usuario creado con éxito'));
            } catch (Exception $e) {
                return response()->json(Service::responseError('Error al crear el usuario: ' . $e->getMessage()));
            }
        }else{
            try {
                $id = Encryption::desencriptar($request->id);
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'genero' => 'required|string|max:1',
                    'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                    'grado' => 'nullable|string|max:250',
                    'firma' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'status' => 'required|integer',
                ]);
                if ($validator->fails()) {
                    return response()->json(Service::responseError('Error de validación', $validator->errors()));
                }
                $user = User::find($id);
                if (!$user) {
                    return response()->json(Service::responseError('Usuario no encontrado'));
            }

            if($request->hasFile('firma')){
                $file = $request->file('firma');
                if ($file->isValid()) {
                    $path = $file->store('signatures', 'public');// Guarda en storage/app/public/signatures
                    $user->firma = 'public/' . $path;
                }else{
                    return response()->json(Service::responseError('Archivo de firma no válido'));
                }
            }

            if($request->password != ''){
                $user->password = Hash::make($request->password);
            }            

            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->genero = $request->genero;
            $user->email = $request->email;
            $user->grado = $request->grado;
            $user->status = $request->status;
            $user->save();

            return response()->json(Service::responseSuccess('Usuario actualizado con éxito'));
        } catch (Exception $e) {
            return response()->json(Service::responseError('Error al actualizar el usuario: ' . $e->getMessage()));
        }
     }
    
    }

    public function permisos(Request $request)
    {
        return view('admin.user.permisos');
    }

    public function buscarPermisos(Request $request)
    {
        $palabra = $request->palabra;
        $user = User::where('email', $palabra)->first();
        if ($user) {
            $html = '';
            $modulos = Modulo::where('estado', 'A')->get();
            $permisosUsuario = Permission::where('user_id', $user->id)->where('estado', 'A')->pluck('item_id')->toArray();

            // Información del usuario
            $html .= '
            <div class="col-12 mb-4">
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="ti ti-user-check fs-4 me-2"></i>
                    <div>
                        <strong>Usuario:</strong> ' . $user->name . ' ' . $user->lastname . ' 
                        <small class="text-muted">(' . $user->email . ')</small>
                    </div>
                </div>
            </div>';

            foreach ($modulos as $modulo) {
                $submodulos = SubModulo::where('modulo_id', $modulo->id)->where('estado', 'A')->get();
                
                if ($submodulos->count() > 0) {
                    // Card para cada módulo
                    $html .= '
                    <div class="col-12 mb-4">
                        <div class="card border-primary shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title mb-0">
                                    <i class="ti ti-folder fs-5 me-2"></i>' . $modulo->nombre . '
                                </h5>
                            </div>
                            <div class="card-body">';

                    foreach ($submodulos as $submodulo) {
                        $items = Item::where('submodulo_id', $submodulo->id)->where('estado', 'A')->get();
                        
                        if ($items->count() > 0) {
                            // Submódulo con diseño elegante
                            $html .= '
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="ti ti-folder-open text-secondary me-2"></i>
                                    <h6 class="mb-0 text-secondary fw-bold">' . $submodulo->nombre . '</h6>
                                </div>
                                <div class="row g-3">';

                            foreach ($items as $item) {
                                $checked = in_array($item->id, $permisosUsuario) ? 'checked' : '';
                                $html .= '
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check p-3 border rounded-3 h-100 hover-shadow">
                                        <input class="form-check-input" type="checkbox" name="items[]" id="item_' . $item->id . '" ' . $checked . '>
                                        <label class="form-check-label fw-medium" for="item_' . $item->id . '">
                                            <i class="ti ti-key text-warning me-2"></i>' . $item->nombre . '
                                        </label>
                                    </div>
                                </div>';
                            }

                            $html .= '
                                </div>
                            </div>';
                        }
                    }

                    $html .= '
                            </div>
                        </div>
                    </div>';
                }
            }
            
            $datos = [
                'html' => $html,
                'id' => Encryption::encriptar($user->id)
            ];

            return response()->json(Service::responseSuccess('Permisos cargados correctamente', $datos));
        } else {
            return response()->json(Service::responseError('Usuario no encontrado'));
        }
    }

    public function guardarPermisos(Request $request)
    {
        $id = Encryption::desencriptar($request->id);
        $permisosMarcados = $request->permisos;

        // Obtener todos los permisos actuales del usuario
        $permisosActuales = Permission::where('user_id', $id)->get();
        $permisosActualesIds = $permisosActuales->pluck('item_id')->toArray();

        // Iterar sobre los permisos marcados para crear o activar permisos
        foreach ($permisosMarcados as $itemId) {
            $permiso = Permission::where('user_id', $id)->where('item_id', $itemId)->first();

            if ($permiso) {
                // Si el permiso existe y está inactivo, activarlo
                if ($permiso->estado !== 'A') {
                    $permiso->estado = 'A';
                    $permiso->save();
                }
            } else {
                // Si el permiso no existe, crearlo
                Permission::create([
                    'user_id' => $id,
                    'item_id' => $itemId,
                    'estado' => 'A'
                ]);
            }
        }

        // Desactivar los permisos que no están en la lista de permisos marcados
        foreach ($permisosActuales as $permisoActual) {
            if (!in_array($permisoActual->item_id, $permisosMarcados)) {
                $permisoActual->estado = 'I'; //  'I' es el estado inactivo
                $permisoActual->save();
            }
        }

        return response()->json(Service::responseSuccess('Permisos guardados correctamente'));
    }









}
