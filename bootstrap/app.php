<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Configura y arranca el núcleo de la aplicación Laravel
return Application::configure(basePath: dirname(__DIR__))

    // Le indica a Laravel dónde encontrar los mapas de la aplicación
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',          // Conecta el archivo de rutas web
        commands: __DIR__ . '/../routes/console.php', // Conecta los comandos de terminal (Artisan)
        health: '/up',                                // Crea una ruta automática para monitorear que la app esté "viva"
    )

    // Configura el middleware
    ->withMiddleware(function (Middleware $middleware) {
        // Es como un diccionario, traduce el auth.manual a la ubicación real de la clase del middleware
        $middleware->alias([
            'auth.manual' => \App\Http\Middleware\AuthManual::class,
        ]);
    })
    // Espacio para configurar cómo el sistema maneja los errores o caídas
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create(); // Construye y devuelve la aplicación lista para funcionar