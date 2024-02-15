<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use App\Models\Role;
use App\Models\Platillo;
use App\Models\Sucursal;
use App\Models\Venta;
use App\Models\detalle_venta;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class DetalleVentasController extends Controller
{
    public function detallePedido(Request $request)
    {

        $comanda = DB::table('detalle_ventas')
        ->join('platillos', 'platillos.id', '=', 'detalle_ventas.platillo_id')
        ->where('detalle_ventas.venta_id', '=', $request->idventa)
        ->select('detalle_ventas.*', 'platillos.nombre')
        ->get();


        $total = 0;

        foreach ($comanda as $c){
            $subtotal = $c->cantidad * $c->costo;
            $total =$subtotal+$total;
        }

        // Retornar respuesta JSON incluyendo detalles de los platillos agregados
        return response()->json([
            'success' => true,
            'message' => 'Venta registrada correctamente',
            'comanda' => $comanda,
            'total' => $total
        ]);
    }
     public function destroy(Request $request)
    {
        $detalle_venta = detalle_venta::findOrFail($request->idventa);
        $detalle_venta->delete();

        return response()->json([
            'success' => true,
            'message' => 'platillo eliminadi'
        ]);
    }
    public function actualventa(Request $request){




        // procesar la venta.
          DB::table('detalle_ventas')->insert([
            'platillo_id'=>$request->platillo_id,
            'cantidad'=>$request->cantidad,
            'costo'=>$request->costo,
            'Usuario_id'=>$request->Usuario_id,
            'venta_id'=>$request->venta_id
        ]);
        DB::commit();

          $total=$request->cantidad*$request->costo;
          $venta = DB::table('ventas')
          ->where('ventas.id','=',$request->venta_id)
          ->get();
          $totalventa=0;
          foreach ($venta as $v){
            $totalventa+=$v->total;
          }
          $totaltotal=$totalventa+$total;
          DB::table('ventas')
            ->where('ventas.id', "=",1)
            ->update(['total' => $totaltotal]);

          return redirect()->route('ventas.puntov')->with('success', 'Venta realizada con éxito.');
    }

}

