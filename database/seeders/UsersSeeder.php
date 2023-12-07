<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de que este es el namespace correcto para tu modelo User
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
{
    User::truncate(); // Esto eliminará todos los registros existentes en la tabla `users`.
}

        // Usuario 1
        User::create([
            'name' => 'John Doe',
            'address' => '123 Main Street',
            'whatsapp' => '+1234567890',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password1'), 
        ]);

        // Usuario 2
        User::create([
            'name' => 'Jane Smith',
            'address' => '456 Park Avenue',
            'whatsapp' => '+2345678901',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password2'), 
        ]);

        // Usuario 3
        User::create([
            'name' => 'Steve Brown',
            'address' => '789 Broadway Avenue',
            'whatsapp' => '+3456789012',
            'email' => 'stevebrown@example.com',
            'password' => Hash::make('password3'), 
        ]);

        
    }
}
