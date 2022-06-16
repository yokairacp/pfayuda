@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h4>Editar Usuario</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('user.update',$user->id)}}" method="post">
    @csrf
    @method('PUT')
       <div class="form-group">
           <label for="id">id</label>
           <input type="integer" class="form-control" name="id" required maxlength="15" value="{{$user->id}}">
</div>
<br>
<div class="form-group">
           <label for="Nombre">Nombre</label>
           <input type="text" class="form-control" name="name" required maxlength="30"  value="{{$user->name}}">
</div>
<br>
<div class="form-group">
           <label for="email">Email</label>
           <input type="text" class="form-control" name="email" required maxlength="150"  value="{{$user->email}}">
</div>
<br>
<div class="form-group">
           <label for="contraseña">Contraseña</label>
           <input type="contraseña" class="form-control" name="password" required maxlength="100"  value="{{$user->password}}">
</div>
<br>
<div class="form-group">
           <input type="submit" class="btn btn-primary" value="Guardar">
           <input type="reset" class="btn btn-defaul" value="Cancelar">
           <a href="javascript:history.back()">Ir al listado></a>
</div>
</form>
</div>
</div>
</div>

@endsection