<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // El usuario no está autenticado, redirígelo a la página de inicio de sesión o muestra un mensaje de error.
            return redirect('/login');
        }

        if (!$request->user()->hasRole($role)) {
            // El usuario no tiene el rol requerido, puedes redirigirlo a una página de acceso no autorizado o realizar otra acción.
            return abort(403, 'Acceso no autorizado');
        }

        return $next($request);


        return redirect('/');
    }
}