<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated($request, $user)
    {
        $this->loadPermissions($user);
        $this->initializePermissions(Auth::user());
    }

    protected function loadPermissions()
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $permissions = Cache::remember('permissions_' . $userId, 60, function () use ($userId) {
                return DB::table('permissions')
                    ->join('items', 'permissions.item_id', '=', 'items.id')
                    ->join('submodulos', 'items.submodulo_id', '=', 'submodulos.id')
                    ->join('modulos', 'submodulos.modulo_id', '=', 'modulos.id')
                    ->where('permissions.user_id', $userId)
                    ->where('permissions.estado','A')
                    ->select('modulos.codigo as module_code', 'submodulos.codigo as submodule_code', 'items.codigo as item_code', 'permissions.can_view')
                    ->get();
            });

            $permissionsArray = [];

            foreach ($permissions as $permission) {
                $moduleCode = $permission->module_code;
                $submoduleCode = $permission->submodule_code;
                $itemCode = $permission->item_code;

                if (!isset($permissionsArray[$moduleCode])) {
                    $permissionsArray[$moduleCode] = [
                        'submodules' => []
                    ];
                }

                if (!isset($permissionsArray[$moduleCode]['submodules'][$submoduleCode])) {
                    $permissionsArray[$moduleCode]['submodules'][$submoduleCode] = [
                        'items' => []
                    ];
                }

                $permissionsArray[$moduleCode]['submodules'][$submoduleCode]['items'][$itemCode] = [
                    'can_view' => $permission->can_view
                ];
            }

            session(['permissions' => $permissionsArray]);

        }
        
    }

    protected function initializePermissions($user)
    {
        $permissions = $user->permissions()
            ->where('estado', 'A')
            ->with('item')
            ->get()
            ->pluck('item.codigo')
            ->toArray();

        session([
            'm-permission' => $permissions,
            'permission-expiration' => now()->timestamp,
        ]);
        
    }

    





}
