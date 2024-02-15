<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    protected $fillable = ['venta_id', 'platillo_id', 'costo','Usuario_id','costo','cantidad'];



    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class);
    }


}


