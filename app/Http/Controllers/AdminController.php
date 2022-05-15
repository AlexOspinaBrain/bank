<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaccionPostRequest;
use App\Models\Cuentapropia;
use App\Models\Cuentatercero;
use App\Models\Transaccion;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function transaccionPropias(){
        
        $cuentas = Cuentapropia::where('estado','=',true)->get();
        
        $message = request()->input('message') ?? '';

        return view('propias',['cuentas' => $cuentas, 'message' => $message]);

    }

    public function storeTransaccion(TransaccionPostRequest $request){

        $transaccion = new Transaccion();
 
        $transaccion->monto = $request->monto;
        $transaccion->cuentapropias_sale_id = $request->cuentapropias_sale_id;
        $transaccion->cuentapropias_entra_id = $request->cuentapropias_entra_id;
        $transaccion->cuentaterceros_entra_id = $request->cuentaterceros_entra_id;
        $transaccion->user_id = auth()->id();
 
        if ($transaccion->save()) {
                $message = 'Transacción Realizada con exito!';
            } else {
                $message = 'Transacción con Error, intente de nuevo.';
            }

        if ($request->cuentaterceros_entra_id) {
            return redirect()->route('terceros',['message' => $message]);
        } else {
            return redirect()->route('propias',['message' => $message]);
        }

    }

    public function transaccionTerceros(){
        
        $cuentas = Cuentapropia::where('estado','=',true)->get();
        $terceros = Cuentatercero::where('estado','=',true)->get();
        
        $message = request()->input('message') ?? '';

        return view('terceros',['cuentas' => $cuentas, 'terceros' => $terceros, 'message' => $message]);

    }
    
}
