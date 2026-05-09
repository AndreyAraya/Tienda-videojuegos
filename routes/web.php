<?php

use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Visitantes y Clientes)
|--------------------------------------------------------------------------
*/

// Pantalla principal: La Tienda
Route::get('/', [VideojuegoController::class, 'index'])->name('home');

// Pantalla de la Biblioteca (Juegos comprados)
Route::get('/biblioteca', [VideojuegoController::class, 'biblioteca'])->name('videojuegos.biblioteca');

// Acción de COMPRAR (Mueve el juego a la biblioteca)
Route::patch('/videojuegos/{id}/comprar', [VideojuegoController::class, 'comprar'])->name('videojuegos.comprar');

// Acción de DEVOLVER (Mueve el juego de la biblioteca a la tienda)
Route::delete('/videojuegos/{id}/devolver', [VideojuegoController::class, 'devolver'])->name('videojuegos.devolver');


/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Modo Dueño)
|--------------------------------------------------------------------------
*/

// Mostrar el formulario de Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Procesar el inicio de sesión
Route::post('/login', [VideojuegoController::class, 'postLogin']);

// Cerrar sesión
Route::get('/logout', [VideojuegoController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (Solo para el Dueño TVJ)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.manual'])->group(function () {

    // 1. CREAR: Mostrar formulario y guardar nuevo juego
    Route::get('/videojuegos/create', [VideojuegoController::class, 'create'])->name('videojuegos.create');
    Route::post('/videojuegos', [VideojuegoController::class, 'store'])->name('videojuegos.store');

    // 2. EDITAR: Mostrar formulario y actualizar datos
    Route::get('/videojuegos/{id}/edit', [VideojuegoController::class, 'edit'])->name('videojuegos.edit');
    Route::put('/videojuegos/{id}', [VideojuegoController::class, 'update'])->name('videojuegos.update');

    // 3. ELIMINAR: Borrar permanentemente de la base de datos
    Route::delete('/videojuegos/{id}', [VideojuegoController::class, 'destroy'])->name('videojuegos.destroy');
});
