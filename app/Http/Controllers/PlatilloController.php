<?php

namespace App\Http\Controllers;
use App\Models\Platillo;
use App\Models\Sucursal;


use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platillos = Platillo::all();

        // Pasa los platillos a la vista
        return view('platillos.index', compact('platillos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sucursales = Sucursal::all();
        $platillo = new Platillo();
        return view('platillos.create', compact('sucursales', 'platillo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'tiempo_elaboracion' => 'required|integer',
            'costo_produccion' => 'required|numeric',
            'precio_venta' => 'required|numeric'
        ]);
        $request = request()->only([
            'nombre',
            'descripcion',
            'tiempo_elaboracion',
            'costo_produccion',
            'precio_venta'
        ]);

        Platillo::create($request);

        return redirect()->route('platillos.index')->with('success', 'Platillo creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $platillo = Platillo::findOrFail($id);
        return view('platillos.edit', compact('platillo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'tiempo_elaboracion' =>'required|integer',
            'costo_produccion' =>'required|numeric',
            'precio_venta' =>'required|numeric'

        ]);

        $platillo = Platillo::findOrFail($id);
        $platillo->update($request->all());

        return redirect()->route('platillos.index')->with('success', 'Platillo actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $platillo = platillo::findOrFail($id);
        $platillo->delete();
        return redirect()->route('platillos.index')->with('success', 'Platillo eliminado con éxito.');
}
}
