<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\FacturaController; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::orderBy('id', 'asc')->paginate(8);
        return view('productos.index')->with(compact('productos'));
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request, Producto $producto){
        $producto->nombre_producto = $request->nombre;
        $producto->existencia = $request->cantidad;
        $producto->precio = $request->precio;
        
        if($request->hasFile("imagen")){
            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/products/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            $producto->imagen = ''.$nombreimagen.'';          
        }
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto){
        return view('productos.edit')->with(compact('producto'));
    }

    public function update(Request $request, Producto $producto){
        $producto->nombre_producto = $request->nombre;
        $producto->existencia = $request->cantidad;
        $producto->precio = $request->precio;

        if ($request->estado != 2) {
            $producto->estado = $request->estado;
        }
        
        if($request->has('cambiar_imagen')){
            if($request->hasFile("imagen")){
                $imagen = $request->file("imagen");
                $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
                $ruta = public_path("img/products/");

                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);

                $producto->imagen = ''.$nombreimagen.'';          
            }
        }
        $producto->save();

        return redirect()->route('productos.index');

    }

   
}

