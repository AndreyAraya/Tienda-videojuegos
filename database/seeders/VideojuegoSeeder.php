<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideojuegoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('videojuegos')->insert([
            [
                'titulo' => 'The Legend of Zelda: Breath of the Wild',
                'descripcion' => 'Un mundo abierto masivo lleno de aventuras y puzzles.',
                'genero' => 'Aventura',
                'plataforma' => 'Nintendo Switch',
                'precio' => 59.99,
                'stock' => 15,
                'fecha_lanzamiento' => '2017-03-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Elden Ring',
                'descripcion' => 'Un desafiante RPG de acción en un mundo oscuro de fantasía.',
                'genero' => 'RPG',
                'plataforma' => 'PC / PS5 / Xbox',
                'precio' => 49.50,
                'stock' => 10,
                'fecha_lanzamiento' => '2022-02-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'God of War Ragnarök',
                'descripcion' => 'Kratos y Atreus deben viajar a cada uno de los Nueve Reinos.',
                'genero' => 'Acción',
                'plataforma' => 'PS5',
                'precio' => 69.99,
                'stock' => 8,
                'fecha_lanzamiento' => '2022-11-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Grand Theft Auto V',
                'descripcion' => 'Tres criminales muy diferentes lo arriesgan todo en una serie de atracos.',
                'genero' => 'Acción / Mundo Abierto',
                'plataforma' => 'PC / PS5 / Xbox Series',
                'precio' => 29.99,
                'stock' => 40,
                'fecha_lanzamiento' => '2013-09-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'The Last of Us Part I',
                'descripcion' => 'Una historia emotiva sobre la supervivencia en un mundo post-pandémico.',
                'genero' => 'Aventura / Drama',
                'plataforma' => 'PS5 / PC',
                'precio' => 69.99,
                'stock' => 12,
                'fecha_lanzamiento' => '2022-09-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Red Dead Redemption 2',
                'descripcion' => 'La vida épica de Arthur Morgan y la banda de Van der Linde al final del Salvaje Oeste.',
                'genero' => 'Aventura / Western',
                'plataforma' => 'PC / PS4 / Xbox One',
                'precio' => 59.99,
                'stock' => 25,
                'fecha_lanzamiento' => '2018-10-26',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Minecraft',
                'descripcion' => 'Explora mundos infinitos y construye cualquier cosa que imagines.',
                'genero' => 'Sandbox / Construcción',
                'plataforma' => 'Multiplataforma',
                'precio' => 26.95,
                'stock' => 100,
                'fecha_lanzamiento' => '2011-11-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'PUBG: Battlegrounds',
                'descripcion' => 'Sé el último superviviente en este emocionante Battle Royale táctico.',
                'genero' => 'Battle Royale',
                'plataforma' => 'PC / Consolas',
                'precio' => 0.00,
                'stock' => 999,
                'fecha_lanzamiento' => '2017-12-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Forza Horizon 5',
                'descripcion' => 'Lidera expediciones increíbles a través de los paisajes de México.',
                'genero' => 'Carreras',
                'plataforma' => 'PC / Xbox Series',
                'precio' => 59.99,
                'stock' => 20,
                'fecha_lanzamiento' => '2021-11-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Super Mario Odyssey',
                'descripcion' => 'Únete a Mario en una aventura en 3D alrededor del mundo para salvar a la princesa Peach.',
                'genero' => 'Plataformas',
                'plataforma' => 'Nintendo Switch',
                'precio' => 49.99,
                'stock' => 18,
                'fecha_lanzamiento' => '2017-10-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
