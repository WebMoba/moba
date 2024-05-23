<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            $user = Auth::user();
            // Verifica si el correo electrónico es 'agenciamoba@gmail.com'
            if ($user->email === 'agenciamoba@gmail.com') {
                return $next($request);
            }
        }
        // Redirige a la página de inicio o muestra un error 403
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}