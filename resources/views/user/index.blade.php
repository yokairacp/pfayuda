@extends('layouts.dashboard')

@section('content')
        <h4>Gestión de usuarios</h4>
        <br>
        

        <div class="row">
            <div class="col-xl-l2">
                <div class="table-responsive">
                    <table class="table table-striped">
                <thead>
                    <tr>
                         <th>Opciones</th>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Email</th>
                         <th>Contraseña</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
        <th>
          <a href="{{route('user.edit', $usuario->id)}}" class="btn btn-warning btn-sm"> Editar</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$usuario->id}}">
          Eliminar
          </button>

      </th>
        <td>{{$usuario->id}}</td>
        <td>{{$usuario->name}}</td>
        <td>{{$usuario->email}}</td>
        <td>{{$usuario->password}}</td>
</tr>
@include('user.delete')
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