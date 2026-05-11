<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    // Muestra la pantalla principal con los juegos disponibles (no comprados)
    public function index()
    {
        $tienda = Videojuego::where('comprado', false)->get();
        return view('welcome', compact('tienda'));
    }

    // Muestra la biblioteca con los juegos que ya fueron comprados
    public function biblioteca()
    {
        $biblioteca = Videojuego::where('comprado', true)->get();
        return view('biblioteca', compact('biblioteca'));
    }

    // Acción de COMPRAR: Resta 1 al stock y lo mueve a la biblioteca
    public function comprar($id)
    {

        // Busca el juego por ID o falla si no existe, si usamos solo find() y no encuentra el juego y daría un error que puede colapsar la página
        // Con findOrFail() si no encuentra el juego lanza una excepción que se puede manejar o mostrar un error 404 automáticamente
        $juego = Videojuego::findOrFail($id);

        // Verificamos si hay stock antes de comprar
        if ($juego->stock > 0) {
            $juego->decrement('stock'); // Resta 1 automáticamente en la DB
            $juego->update(['comprado' => true]);
            return redirect()->route('videojuegos.biblioteca')->with('success', '¡Juego adquirido!');
        }

        return back()->with('error', 'Lo sentimos, no queda stock de este título.');
    }

    // Este método ahora solo devuelve el juego al catálogo (no lo borra)
    // Acción de DEVOLVER: Suma 1 al stock y lo regresa a la tienda
    public function devolver($id)
    {
        $juego = Videojuego::findOrFail($id);

        $juego->increment('stock'); // Suma 1 automáticamente en la DB
        $juego->update(['comprado' => false]);

        return redirect()->route('home')->with('info', 'Juego devuelto y stock actualizado.');
    }

    // Este método ELIMINA permanentemente el juego de la DB
    public function destroy($id)
    {
        Videojuego::destroy($id);
        return redirect()->route('home')->with('info', 'Juego eliminado del sistema');
    }

    // Muestra el formulario vacío para crear un nuevo videojuego
    public function create()
    {
        return view('create');
    }

    // Recibe los datos del formulario y los guarda en la base de datos
    public function store(Request $request)
    {
        Videojuego::create($request->all());
        return redirect()->route('home');
    }

    // Muestra el formulario de edición cargando los datos actuales del juego
    public function edit($id)
    {
        $juego = Videojuego::findOrFail($id);
        return view('edit', compact('juego'));
    }

    // Recibe los datos actualizados del formulario y sobrescribe el registro en la base de datos
    public function update(Request $request, $id)
    {
        Videojuego::findOrFail($id)->update($request->all());
        return redirect()->route('home');
    }

    // Valida las credenciales manuales para iniciar sesión
    public function postLogin(Request $request)
    {
        if ($request->usuario === 'TGV' && $request->password === '1234') {
            session(['logueado' => true]);
            // CAMBIO: Ahora te mantiene en la tienda
            return redirect()->route('home');
        }
        return back()->with('error', 'Credenciales incorrectas');
    }

    // Elimina la variable de sesión para cerrar la cuenta del usuario
    public function logout()
    {
        session()->forget('logueado');
        return redirect()->route('home');
    }
}
