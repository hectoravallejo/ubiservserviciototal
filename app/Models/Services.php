<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'name', 'description', 'photo', 'address', 'coverage', 'whatsapp',
    ];

    // En un futuro relacionar servicios con usuarios si guardas un registro de quién ha solicitado qué servicio
    // public function users() {
    //     return $this->belongsToMany(User::class);
    // }
}
