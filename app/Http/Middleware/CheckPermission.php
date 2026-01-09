<?php

namespace App\Http\Middleware;

use App\Helpers\Service;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$routeName): Response
    {
        $user = Auth::user();

        if ($user){
            $tiempoPermiso = session('permission-expiration', null);
            if (isset($tiempoPermiso)){
                if ($this->issetPermission($user,$routeName)){
                    $this->initializePermissions($user);
                    return $next($request);
                }
            }else{
                $storedTimestamp = $tiempoPermiso;
                $currentTimestamp = now()->timestamp;
                if (($currentTimestamp - $storedTimestamp) > 600) {
                    if ($this->issetPermission($user,$routeName)){
                        $this->initializePermissions($user);
                        return $next($request);
                    }
                } else {
                    $permissions = session('m-permission', []);
                    if (in_array($routeName, $permissions)) {
                        return $next($request);
                    }else{
                        if ($this->issetPermission($user,$routeName)){
                            $this->initializePermissions($user);
                            return $next($request);
                        }
                    }
                }

            }

        }

        if ($request->expectsJson()) {
            return response()->json(Service::responseError('No autorizado',[],403));
        } else {
            return response()->view('errors.403', []);
        }
    }
    private function initializePermissions($user)
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

    private function issetPermission($user, $routeName)
    {
    return $user->permissions()
            ->where('estado', 'A')
            ->whereHas('item', function($query) use ($routeName) {
                $query->where('codigo', $routeName);
            })
            ->exists();
    }


}
