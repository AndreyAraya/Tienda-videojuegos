<?php

use App\Models\Videojuego;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;


// Rutas web para la aplicación de la tienda de videojuegos


// Pantalla principal: La Tienda
Route::get('/', [VideojuegoController::class, 'index'])->name('home');


// Pantalla de la Biblioteca (Juegos comprados)
Route::get('/biblioteca', [VideojuegoController::class, 'biblioteca'])->name('videojuegos.biblioteca');


// Acción de COMPRAR (Mueve el juego a la biblioteca)
Route::patch('/videojuegos/{id}/comprar', [VideojuegoController::class, 'comprar'])->name('videojuegos.comprar');


// Acción de DEVOLVER (Mueve el juego de la biblioteca a la tienda)
Route::delete('/videojuegos/{id}/devolver', [VideojuegoController::class, 'devolver'])->name('videojuegos.devolver');


// Comunidad
Route::get('/comunidad', function () {
    $tienda = \App\Models\Videojuego::where('comprado', false)->get();
    return view('comunidad', compact('tienda'));
})->name('comunidad');


// Soporte
Route::get('/soporte', function () {
    return view('soporte');
})->name('soporte');


// Rutas para opciones de administración (Crear, Editar, Eliminar), solo modo dueño


// Mostrar el formulario de Login
Route::get('/login', function () {
    return view('login');
})->name('login');


// Procesar el inicio de sesión
Route::post('/login', [VideojuegoController::class, 'postLogin']);


// Cerrar sesión
Route::get('/logout', [VideojuegoController::class, 'logout'])->name('logout');



// Cualquier ruta de estas requiere la verificación del middleware 'auth.manual'


Route::middleware(['auth.manual'])->group(function () {


    // CREAR
    // GET: Renderiza el formulario vacío.
    // POST: Almacena el nuevo registro en la base de datos.
    // CREAR: Mostrar formulario y guardar nuevo juego
    Route::get('/videojuegos/create', [VideojuegoController::class, 'create'])->name('videojuegos.create');
    Route::post('/videojuegos', [VideojuegoController::class, 'store'])->name('videojuegos.store');


    // EDITAR
    // GET: Renderiza el formulario poblado con los datos del registro {id}.
    // PUT: Actualiza el registro existente en la base de datos.
    // EDITAR: Mostrar formulario y actualizar datos    
    Route::get('/videojuegos/{id}/edit', [VideojuegoController::class, 'edit'])->name('videojuegos.edit');
    Route::put('/videojuegos/{id}', [VideojuegoController::class, 'update'])->name('videojuegos.update');


    // ELIMINAR
    // DELETE: Elimina permanentemente el registro {id} de la base de datos.
    // ELIMINAR: Borrar permanentemente de la base de datos
    Route::delete('/videojuegos/{id}', [VideojuegoController::class, 'destroy'])->name('videojuegos.destroy');
});
