<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario está autenticado y tiene el rol de 'Administrador',
        // permitir el acceso a las rutas protegidas
        if (Auth::check() && Auth::user()->rol === 'Administrador') {
            return $next($request);
        }

        // Si el usuario no está autenticado o no es un administrador,
        // permitir el acceso a la solicitud
        return $next($request);
    }
}