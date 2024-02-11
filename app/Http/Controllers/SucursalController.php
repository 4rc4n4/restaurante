<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('sucursales.index', compact('sucursales'));
    }


    public function create()
    {
        return view('sucursales.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required','min:3','max:150'],
            'domicilio' => ['required','min:3','max:150'],
            'telefono' => ['required','min:3','max:150'],
            'email' => ['required','email:rfc,dns','max:150'],
            'ciudad' => ['required','min:3','max:150'],
            'estado' => ['required','min:3','max:150'],
            'pais' => ['required','min:3','max:150'],
            'codigo_postal'=> ['required','min:3','max:150']
        ]);
        $request = request()->only([
            'nombre',
            'domicilio',
            'telefono',
            'email',
            'ciudad',
            'estado',
            'pais',
            'codigo_postal'
        ]);

        Sucursal::create($request);

        return to_route('sucursales.index')->with('status', 'Sucursal creada de manera correctamente');
    }

    // ver platillos en sucursales
    public function verPlatillos(Request $request)
    {
        $sucursales = Sucursal::all();
        $platillos = collect();
        $sucursalSeleccionada = null;

        if ($request->has('sucursal_id')) {
            $sucursalSeleccionada = Sucursal::find($request->sucursal_id);
        }

        if ($sucursalSeleccionada === null) {
            $sucursalSeleccionada = $sucursales->first();
            $platillos = $sucursalSeleccionada->platillos;
        } else {
            $platillos = $sucursalSeleccionada->platillos;
        }

        // Asegúrate de ajustar la ruta a la ubicación correcta de la vista
        return view('layouts.lista.ver_platillos', compact('sucursales', 'platillos', 'sucursalSeleccionada'));
    }

    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required','min:3','max:150'],
            'domicilio' => ['required','min:3','max:150'],
            'telefono' => ['required','min:3','max:150'],
            'email' => ['required','email:rfc,dns','max:150'],
            'ciudad' => ['required','min:3','max:150'],
            'estado' => ['required','min:3','max:150'],
            'pais' => ['required','min:3','max:150'],
            'codigo_postal'=> ['required','min:3','max:150']
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $sucursal = Sucursal::findOrFail($id);
            $sucursal->delete();
            return redirect()->route('sucursales.index')->with('success', 'Sucursal eliminada con éxito.');
        } catch (QueryException $e) {
            return redirect()->route('sucursales.index')->with('error', 'No se puede eliminar la sucursal porque tiene personal y platillos asignados.');
        }
    }
}
