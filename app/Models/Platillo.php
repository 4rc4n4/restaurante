<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'tiempo_elaboracion', 'costo_produccion', 'precio_venta',
    ];

    // relacion platillo con una sucursal
    public function sucursal()
    {
        return $this->belongsToMany(Sucursal::class, 'platillo_sucursal');

    }
}


