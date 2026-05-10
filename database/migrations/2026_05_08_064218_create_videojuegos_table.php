<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecuta las migraciones
    // Este método se encarga de crear la tabla videojuegos en la base de datos con código php y no con SQL

    public function up(): void
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();                          // Llave primaria
            $table->string('titulo');              // Nombre del videojuego
            $table->text('descripcion');           // Descripción
            $table->string('genero');              // Género
            $table->string('plataforma');          // Plataforma
            $table->decimal('precio', 8, 2);       // Precio (8 dígitos en total, 2 decimales)
            $table->integer('stock');              // Inventario disponible
            $table->date('fecha_lanzamiento');     // Fecha de lanzamiento
            $table->string('imagen')->nullable();  // Ruta o enlace de la imagen (permite null por si se sube un juego sin imagen)
            $table->boolean('comprado')->default(false); // Booleano para indicar si el juego ha sido comprado y añadirlo a la biblioteca
            $table->timestamps();                  // Columnas de registro: created_at y updated_at (automáticas)
        });
    }


    // Revierte las migraciones
    // Este método se ejecuta al hacer un "rollback". Deshace los cambios realizados por el método up() en caso de un error o emergencia


    public function down(): void
    {
        Schema::dropIfExists('videojuegos');
    }
};
