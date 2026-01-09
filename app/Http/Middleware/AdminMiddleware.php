<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
          
            if (Auth::check() && Auth::user()->tieneAccesoPorArea('TI')) {
                return $next($request);
            }

            return redirect()->route('home');
        } catch (Exception $e) {
          
            return redirect()->route('home');
        }
    }
}
