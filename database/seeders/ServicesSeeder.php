<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Services;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        // Elimina los datos existentes y resetea la secuencia de IDs
        Services::truncate();

        // Servicio 1
        Services::create([
            'name' => 'Limpieza Profesional',
            'description' => 'Servicios de limpieza para oficinas y hogares.',
            'photo' => 'url_a_la_imagen_de_servicio_1.jpg',
            'address' => 'Calle Limpiadores 456',
            'coverage' => 'Ciudad Metrópolis y alrededores.',
            'whatsapp' => '+4567890123',
        ]);

        // Servicio 2
        Services::create([
            'name' => 'Mensajería Express',
            'description' => 'Servicio de mensajería y paquetería urgente.',
            'photo' => 'url_a_la_imagen_de_servicio_2.jpg',
            'address' => 'Avenida Paquetería 789',
            'coverage' => 'Todo el país.',
            'whatsapp' => '+5678901234',
        ]);

        // Servicio 3
        Services::create([
            'name' => 'Reparaciones El Solucionador',
            'description' => 'Reparaciones eléctricas y plomería para el hogar.',
            'photo' => 'url_a_la_imagen_de_servicio_3.jpg',
            'address' => 'Calle Herramientas 159',
            'coverage' => 'Zona Norte de la Ciudad.',
            'whatsapp' => '+6789012345',
        ]);
    }
}
