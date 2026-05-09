<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');              // Título
            $table->text('descripcion');           // Descripción
            $table->string('genero');              // Género
            $table->string('plataforma');          // Plataforma
            $table->decimal('precio', 8, 2);       // Precio
            $table->integer('stock');              // Inventario
            $table->date('fecha_lanzamiento');     // Fecha
            $table->string('imagen')->nullable();  // Esto crea el casillero para el link
            $table->timestamps();                  // created_at y updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videojuegos');
    }
};
