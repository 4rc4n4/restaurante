<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use App\Models\Role;
use App\Models\Platillo;
use App\Models\Sucursal;


class DashboardController extends Controller
{
    public function index()
        {
            $test=auth()->id();
            $rolNombre = Usuario::find($test)->puesto;
            if($rolNombre =='administrador'){
                return view('dashboard');
            }
            elseif($rolNombre =='mesero'){
                $platillos = Platillo::all();
                $sucursal = Sucursal::all();
                // Pasa los platillos a la vista
                return view('ventas.puntov',compact('sucursal','platillos'));
            }

        }
}
