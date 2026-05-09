<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthManual
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si NO existe la sesión 'logueado', lo mandamos al login
        if (!session()->has('logueado')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero.');
        }

        return $next($request);
    }
}
