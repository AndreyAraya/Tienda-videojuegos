<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


// Middleware AuthManual
// Actúa como una capa de seguridad (como un oficial de seguridad en una disco) para las rutas protegidas y permite acceder a las rutas hasta qye verifique
class AuthManual
{
    // Intercepta la petición antes de que llegue al controlador
    // Si los datos no son correctos redirige al login con un mensaje de error 

    public function handle(Request $request, Closure $next): Response
    {
        // Si NO existe la sesión 'logueado', lo mandamos al login
        if (!session()->has('logueado')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero.');
        }

        return $next($request); // Si la sesión es correcta, permite continuar
    }
}
