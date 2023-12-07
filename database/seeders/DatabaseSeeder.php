<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            StoresSeeder::class,
            ServicesSeeder::class,
            ProductsSeeder::class,
            
        ]);
    }
}
