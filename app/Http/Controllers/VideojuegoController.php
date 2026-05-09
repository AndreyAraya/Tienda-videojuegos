<?php

namespace App\Http\Controllers;

use App\Models\Videojuego; // NO OLVIDES ESTA LÍNEA
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Muestra la tienda con los juegos de la DB.
     */
    public function index()
    {
        // 1. Pedimos todos los juegos a la base de datos
        $videojuegos = Videojuego::all();

        // 2. Se los pasamos a la vista 'welcome'
        return view('welcome', compact('videojuegos'));
    }

    // ... los demás métodos (create, store, etc.) pueden quedarse vacíos por ahora
}
