<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // No olvides esta línea

class VideojuegoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('videojuegos')->insert([
            [
                'nombre' => 'The Legend of Zelda: Tears of the Kingdom',
                'precio' => 69.99,
                'descripcion' => 'Aventura épica en el reino de Hyrule.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Elden Ring',
                'precio' => 59.99,
                'descripcion' => 'RPG de acción en un mundo abierto oscuro.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
