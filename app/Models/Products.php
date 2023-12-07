<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'store_id', 'name', 'description', 'price', 'photo',
    ];

    // Un producto pertenece a una tienda
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
}

