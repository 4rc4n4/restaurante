<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Sucursal;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\SucursalController;
use Illuminate\Validation\Rule;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $existenUsuarios = Usuario::exists();
        $sucursales = Sucursal::all();
        return view('usuarios.create', compact('existenUsuarios', 'sucursales'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'domicilio'=> 'required|max:255',
            'email_contacto' => 'required|email|unique:usuarios,email_contacto',
            'telefono_contacto'=> 'required|max:255',
            'numero_seguro_social'=> 'required|max:255',
            'RFC'=> 'required|max:255',
            'sueldo_diario'=> 'required|max:255',
            'sucursal_id'=> 'required|max:255'
        ]);

        $usuario = new Usuario($validated);
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $sucursales = Sucursal::all();
        $roles = Role::all();
        return view('usuarios.edit', compact('usuario', 'sucursales', 'roles'));

    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'domicilio'=> 'required|max:255',
            'email_contacto' => ['required', 'email', 'max:255', Rule::unique('usuarios', 'email_contacto')->ignore($usuario->id)],
            'telefono_contacto'=> 'required|max:255',
            'role_id'=> 'required|exists:roles,id',
            'numero_seguro_social'=> 'required|max:255',
            'RFC'=> 'required|max:255',
            'sueldo_diario'=> 'required|numeric',
            'sucursal_id'=> 'required|exists:sucursales,id'
        ]);

        $usuario->update($validated);

        // Asocia el rol usando role_id directamente
        $usuario->roles()->sync([$request->role_id]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
