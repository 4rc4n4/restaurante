<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'domicilio', 'telefono', 'email', 'ciudad', 'estado', 'pais', 'codigo_postal'];
    protected $table = 'sucursales';

}
