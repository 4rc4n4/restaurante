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
        return view('sucursales.index',[
            "sucursales" => Sucursal::all()
        ]);
    }


    public function create()
    {
        return view('sucursales.index',[
            "sucursales" => Sucursal::all()
        ]);
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
            'pais' => ['required','min:3','max:150']

        ]);
        $request = request()->only([
            'nombre',
            'domicilio',
            'telefono',
            'email',
            'ciudad',
            'estado',
            'pais'
        ]);
        Sucursal::create($request);

        return to_route('Sucursal.index')->with('status', 'Sucursal creada de manera correctamente');
    }


    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}
