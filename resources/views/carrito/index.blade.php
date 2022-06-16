@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
    
                <div class="card-header">{{ __('Carrito') }} <i class="bi bi-cart"></i></div>
    
                <div class="card-body">
                    @foreach ($productos as $producto)
                    <div class="row mb-3">
                        <div class="col-md-2" >
                            <img class="w-100 h-auto" src="{{ asset('img/products/'.$producto->imagen.'') }}" alt="{{$producto->imagen}}">
                        </div>
                        <label for="imagen" class="col-md-2 col-form-label text-md-start">{{$producto->nombre_producto}}</label>
    
                        <div class="col-md-2">
                            <input type="number" name="cantidad" min="1" max="{{$producto->existencia}}" value="{{$producto->cantidad}}" onChange="CambiaCantidad({{$producto->id}}, {{$producto->precio}})" class="cantidad form-control" id="cantidadProducto{{$producto->id}}">
                            @method("put")
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>
    
                        <div class="col-md-2 col-form-label">
                            <span class="text-md-start" id="precio" data-precio="{{$producto->precio}}">RD$ @php
                                echo number_format($producto->precio)
                            @endphp</span>
                        </div>
    
                        <div class="col-md-2 col-form-label">
                            <span class="text-md-end" id="monto{{$producto->id}}">RD$ @php
                                echo number_format(($producto->precio)*($producto->cantidad))
                            @endphp</span>
                            <input type="hidden" class="monto" value="@php
                            echo number_format(($producto->precio)*($producto->cantidad))
                        @endphp" id="monto_input{{$producto->id}}">
                        </div>
    
                        <div class="col-md-2 col-form-label">
                        <form action="">
                                @csrf
                                @method('DELETE')
                                <imput type="submit" class="btn btn-danger btn-sm bi bi-trash" value="Eliminar" method="post">
                            </form>
                        </div>
                    </div>
                    <div class="border-bottom my-2"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Total a pagar:') }} <span class="fw-bold" id="total"></span></div>
    
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="imagen" class="col-md-5 col-form-label text-md-start">Subtotal:</label>
    
                        <label for="imagen" class="col-md-7 col-form-label text-md-end" id="subtotal"></label>
                    </div>
                    <div class="row mb-3">
                        <label for="imagen" class="col-md-5 col-form-label text-md-start">ITBIS(18%):</label>
    
                        <label for="imagen" class="col-md-7 col-form-label text-md-end" id="itbis"></label>
                    </div>
                    <div class="row mb-3">
                        <label for="imagen" class="col-md-5 col-form-label text-md-start">Total:</label>
    
                        <label for="imagen" class="col-md-7 col-form-label text-md-end" id="totalt"></label>
                    </div>


                    <form action="{{ route('carrito.factura2') }}" method="post">
                        @csrf
                        @method('post')      
                    <button class="btn btn-success form-control" href=""> Pagar </a> <i class="bi bi-cash-stack"></i></button>
                    </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('../js/carrito.js')}}"></script>


@endsection