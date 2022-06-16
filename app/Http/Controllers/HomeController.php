<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function pago(){
        return view('carrito.factura2');
    }
    public function pdf(){
        return view('carrito.pdf');
    }
    public function index(){
        $productos = Producto::orderBy('id', 'desc')
        ->where('estado', true)
        ->paginate(8);
        return view('home')->with(compact('productos'));
    }

    public function carrito(){
        $productos = Producto::orderBy('carritos.id', 'desc')
        ->join('carritos', 'carritos.id_producto', '=', 'productos.id')
        ->where('carritos.id_usuario', Auth()->user()->id)
        ->get();
        return view('carrito.index')->with(compact('productos'));
    }

    public function add(Carrito $carrito, Request $request, Producto $producto){
        $existe = Carrito::where('id_producto',$producto->id)->count();
        if ($existe >= 1) {
            $cantidad = ($existe) + 1;
            $carrito = Carrito::where('id_producto',$producto->id)->update(['cantidad' => $cantidad]);
        } else {
            $carrito->id_producto = $producto->id;
            $carrito->id_usuario = Auth()->user()->id;
            $carrito->cantidad = 1;

            $carrito->save();
        }

        return redirect()->route('carrito.index');
    }

    public function updateProducto(Carrito $carrito, $id, $cantidad){
            $carrito = Carrito::find($id);
            $carrito->cantidad = $cantidad;

            $carrito->save();

            echo json_encode($cantidad);
    }

    public function factura(Carrito $carrito, Request $request, Producto $producto){
        $existe = Carrito::where('id_producto',$producto->id)->count();
        if ($existe >= 1) {
            $cantidad = ($existe) + 1;
            $carrito = Carrito::where('id_producto',$producto->id)->update(['cantidad' => $cantidad]);
        } else {
            $carrito->id_producto = $producto->id;
            $carrito->id_usuario = Auth()->user()->id;
            $carrito->cantidad = 1;

            $carrito->save();
        }

        return redirect()->route('carrito.factura');
    }

    public function destroy($id)
    {
        $producto=Carrito::findOrFail($id);
        $producto->delete();
        return redirect()->route('carrito.index');
    }
}
