<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Stores;

class StoresSeeder extends Seeder
{
    public function run()
    {
        // Desactivar la revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar la tabla
        Stores::truncate();

        // Reactivar la revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Tienda 1
        Stores::create([
            'name' => 'Tienda Los Alpes',
            'address' => 'Av. Siempre Viva 742',
            'delivery' => 1, // Cambiado de 'shipping' a 'delivery'
            'description' => 'Tienda de deportes especializada en equipo de montaña.',
            'photo' => 'url_a_la_imagen_de_tienda_1.jpg',
        ]);

        // Tienda 2
        Stores::create([
            'name' => 'ElectroTienda 24/7',
            'address' => 'Avenida Tecnológica 456',
            'delivery' => 0,
            'description' => 'Tu tienda de confianza para la última tecnología en electrónicos, desde smartphones hasta portátiles.',
            'photo' => 'imagen_electrotienda.jpg', // Asegúrate de reemplazar esto con la URL real de la imagen
]);

        // Tienda 3
        Stores::create([
            'name' => 'Librería El Buen Lector',
            'address' => 'Bulevar de los Escritores 789',
            'delivery' => 1,
            'description' => 'Un paraíso para los amantes de los libros, con colecciones desde clásicos hasta los últimos best-sellers.',
            'photo' => 'imagen_libreria.jpg', // Asegúrate de reemplazar esto con la URL real de la imagen
]);

    }
}
