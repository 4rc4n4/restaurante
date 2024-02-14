<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use App\Models\Role;
use App\Models\Platillo;
use App\Models\Sucursal;
use App\Models\Venta;


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
                $usuario = Usuario::find(auth()->id());
                $sucursal = Sucursal::find($usuario->sucursal_id);
                $platillos = $sucursal->platillos;
                $ventas = Venta::where('usuario_id', $usuario->id)->where('status', 0)->get();
                return view('ventas.puntov',compact('sucursal','platillos','usuario','ventas'));
            }

        }
    public function store(Request $request)
        {

            $venta = new Venta();
            $venta->usuario_id = auth()->id();
            $venta->sucurlsal_id = $request->sucursal_id;
            $venta->status = 0;
            $venta->mesa =$request->mesa;
            $venta->total = 0; // total despues de sacar cuenta


            //foreach ($request->platillos as $platilloId) {
            //    $platillo = Platillo::findOrFail($platilloId);
            //    $venta->total += $platillo->precio_venta;
            //}

            $venta->save();

            return redirect()->route('dashboard.index')->with('success', 'Venta realizada con éxito.');
        }
        //llamda axas
    public function agregarPedido(Request $request)
        {
            return $request;
            return response()->json(['success' => true, 'message' => 'Pedido agregado exitosamente']);
        }
}
