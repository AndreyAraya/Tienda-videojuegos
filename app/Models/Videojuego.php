<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    // Le confirmamos a Laravel el nombre de la tabla, porque normalmente lo busca como Videojuegos, con s al final
    protected $table = 'videojuegos';

    // Campos para usar en el backend y frontend
    protected $fillable = [
        'titulo',
        'descripcion',
        'genero',
        'plataforma',
        'precio',
        'stock',
        'fecha_lanzamiento',
        'imagen',
        'comprado',
    ];
}
