<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $fillable = [
        'name', 'address', 'delivery', 'description', 'photo',
    ];

    // Una tienda tiene muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
