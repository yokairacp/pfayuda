@extends('layouts.dashboard')

@section('content')
<h3>Productos</h3>
<div class="main">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar producto <i class="bi bi-plus"></i></a>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Existencia</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
          <tr>
            <th scope="row">{{ $producto->id }}</th>
            <td>{{ $producto->nombre_producto }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->existencia }}</td>
            @if ($producto->estado)
                <td><span class="bg-success text-white rounded p-1 text-center">Activo</span></td>
            @else
                <td><span class="bg-warning text-white rounded p-1 text-center">Inactivo</span></td>
            @endif
            <td>
                <a href="{{ route('productos.edit', $producto->id) }}" class="text-white btn btn-primary btn-sm">Editar <i class="bi bi-pencil"></i></a>
                
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection