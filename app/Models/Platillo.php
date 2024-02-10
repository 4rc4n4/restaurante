<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;

    //relacion de platillos con sucursales
public function sucursales()
{
    return $this->belongsToMany(Sucursal::class);
}
}


