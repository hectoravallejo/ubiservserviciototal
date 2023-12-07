<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable; 

    protected $fillable = [
        'name', 'address', 'whatsapp', 'photo', 'email', 'password',
    ];

    // El atributo oculto para las contraseñas, etc.
    protected $hidden = [
        'password',
    ];

    // El atributo de casting para los campos nativos como boolean, dates, etc.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // No se necesitan relaciones directas con productos o servicios, ya que estos son visibles para todos los usuarios por igual
}
