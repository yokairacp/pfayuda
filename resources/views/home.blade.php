@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row row-cols-auto justify-content-center">
            @foreach ($productos as $producto)
            <div class="col-sm-2.5 border rounded m-2 p-2 justify-content-center text-center">
                <img src="{{ asset('img/products/'.$producto->imagen.'') }}" alt="{{$producto->imagen}}" id="img-card"><br>
                <label>{{$producto->nombre_producto}}</label>
                <div class="fs-6 fw-light m-1 rounded">
                    <span class="bg-light p-1 rounded">RD$ @php
                        echo number_format($producto->precio, 2)
                    @endphp</span>
                </div>
                <div>
                    <form action="{{ route('carrito.add', $producto->id) }}" method="post">
                        @csrf
                        @method('post')
                        <button class="btn btn-primary m-2"><i class="bi bi-cart"></i> Agregar al carrito</button>
                    </form>
                </div>
            </div>
            @endforeach
            {{$productos->render()}}
        </div>
    </div>
</div>
@endsection
