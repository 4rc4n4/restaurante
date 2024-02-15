<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Sucursal;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\SucursalController;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function puntoDeVenta($sucursalId)
    {
        $usuario = Usuario::find(auth()->id());
        $sucursal = Sucursal::with('platillos')->findOrFail($sucursalId);
        exit(0);
        $platillos = $sucursal->platillos;
        return view('ventas.puntov', compact('sucursal', 'platillos','usuario'));
    }

    public function realizarVenta(Request $request)
    {
        // procesar la venta.

        $venta = new Venta();
        $venta->mesero_id = auth()->id();
        $venta->sucursal_id = $request->sucursal_id;
        $venta->estatus = "";
        $venta->mesa ="";
        $venta->total = 0; // total despues de sacar cuenta


        foreach ($request->platillos as $platilloId) {
            $platillo = Platillo::findOrFail($platilloId);
            $venta->total += $platillo->precio_venta;
        }

        //$venta->save();

        return redirect()->route('ventas.puntov')->with('success', 'Venta realizada con éxito.');
    }
}
