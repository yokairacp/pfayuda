@extends('layouts.dashboard')

@section('content')
        <h4>Pagos realizados clientes</h4>
        <br>
        

        <div class="row">
            <div class="col-xl-21">
                <div class="table-responsive">
                    <table class="table table-striped">
                <thead>
                    <tr>
                         <th>Opciones</th>
                         <th>ID</th>
                         <th>Numero Tarjeta</th>
                         <th>Telefono</th>
                         <th>Provincia</th>
                         <th>Municipio</th>
                         <th>Direccion</th>
                         <th>Codigo Postal</th>
                         <th>Expiración</th>
                         <th>Estado</th>
                         <th></th>
                       
          </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
        <th>
       
          </button>
          
      </th>

       <td></td>
        <td>{{$cliente->id}}</td>
        <td>{{$cliente->numero_tarjeta}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->provincia}}</td>
        <td>{{$cliente->municipio}}</td>
        <td>{{$cliente->direccion}}</td>
        <td>{{$cliente->codigo_postal}}</td>
        <td>{{$cliente->expiracion}}</td>
        <td></td>
        <td></td>
        <td></td>
        @if ($cliente->estado)
                <td><span class="bg-success text-white rounded p-1 text-center">Activo</span></td>
            @else
                <td><span class="bg-warning text-white rounded p-1 text-center">Inactivo</span></td>
            @endif
       
</tr>

@endforeach
      </tbody>
  </table>
</div>
</div>
</div>
</div> 

          </tr>
        
        </tbody>
      </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection