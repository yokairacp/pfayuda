<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\FacturaController; 
use App\Http\Controllers\ProductoController; 
use App\Models\Carrito; 
use App\Models\Pedido; 
use App\Models\Producto; 
Use Datetime;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redis;


class FacturaController extends HomeController{ 
    

    public function factura(Request $request){ 

        if(session()->has('carrito')){ 
            // $carrito = $request ->sesión()->get('carrito'); 
            // $cant = cuenta($carrito); 
            // $productosIDs = []; 
            // for ($i=0; $i < $cant; $i++) { 
            // array_push($productosIDs, [$carrito[$i]['id_producto']]); 
            // } 
            $productos = $solicitud->sesion()->get('carrito'); 
            return view('carrito.factura', compact('productos'));
        }else{ 
            return redirect()->route('carrito.factura');

 
    } 
  } 
}