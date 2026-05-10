<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Utilizamos el modelo base de Eloquent para interactuar con la base de datos

class Videojuego extends Model
{
    // Le confirmamos a Laravel el nombre de la tabla, normlmente se asume que el nombre de la tabla es el plural del nombre del modelo, pero lo especificamos para evitar confusiones
    protected $table = 'videojuegos';

    // Campos para usar en el backend y frontend
    protected $fillable = [ //El arreglo $fillable define los campos que se pueden asignar y llenar en forumlarios, el resto de datos los ignora
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
