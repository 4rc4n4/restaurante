<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sucursal;
use App\Models\Platillo;

class SucursalPlatilloController extends Controller
{
    // Método para mostrar el formulario de asignación de platillos a una sucursal
    public function showForm($sucursalId)

    {
        $sucursal = Sucursal::findOrFail($sucursalId);
        $platillos = Platillo::all();
        return view('sucursales.asignar_platillo', compact('sucursal', 'platillos'));
    }

    // Método para procesar la asignación de un platillo a una sucursal
    public function asignarPlatillo(Request $request, $sucursalId)
    {
        $sucursal = Sucursal::findOrFail($sucursalId);


        $platillosIds = $request->input('platillos', []);

        foreach ($platillosIds as $platilloId) {
            // Verificar si la relación ya existe para evitar duplicados
            if (!$sucursal->platillos()->where('platillo_id', $platilloId)->exists()) {
                $sucursal->platillos()->attach($platilloId);
            }
        }

        return redirect()->route('sucursales.index')->with('success', 'Platillos asignados correctamente.');
    }
}
