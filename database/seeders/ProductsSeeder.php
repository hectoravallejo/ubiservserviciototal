<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\Stores;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Elimina los datos existentes y resetea la secuencia de IDs
        Products::truncate();

        // Obtiene algunas tiendas
        $tiendas = Stores::all();

        // Asegúrate de que hay tiendas disponibles
        if ($tiendas->count() < 3) {
            $this->command->info('Por favor crea al menos tres tiendas antes de ejecutar este seeder.');
            return;
        }

        // Producto asociado con la tienda con id 1
        Products::create([
            'store_id' => 1, // Asocia el producto con la tienda que tiene el id 1
            'name' => 'Cámara Digital',
            'description' => 'Cámara digital 20MP con zoom óptico 8x.',
            'price' => 199.99,
            'photo' => 'url_a_la_imagen_del_producto_1.jpg', // Reemplaza con la URL real de la imagen
        ]);

        // Producto asociado con la tienda con id 2
        Products::create([
            'store_id' => 2, // Asocia el producto con la tienda que tiene el id 2
            'name' => 'Zapatillas Deportivas',
            'description' => 'Zapatillas deportivas para running, máxima comodidad.',
            'price' => 89.99,
            'photo' => 'url_a_la_imagen_del_producto_2.jpg', // Reemplaza con la URL real de la imagen
        ]);

        // Producto asociado con la tienda con id 3
        Products::create([
            'store_id' => 3, // Asocia el producto con la tienda que tiene el id 3
            'name' => 'Smartphone 5G',
            'description' => 'Último modelo de smartphone con tecnología 5G.',
            'price' => 999.99,
            'photo' => 'url_a_la_imagen_del_producto_3.jpg', // Reemplaza con la URL real de la imagen
        ]);
    }
}
