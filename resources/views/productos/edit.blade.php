@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar producto:') }} {{$producto->nombre_producto}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="Nombre producto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre producto') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre_producto) }}" required autocomplete="off" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="precio" value="{{ old('precio', $producto->precio) }}" required autocomplete="off" autofocus>

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad', $producto->existencia) }}" required autocomplete="off" autofocus>

                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>

                            <div class="col-md-6">
                                <input type="checkbox" name="cambiar_imagen" value="cambiar" id="checkbox">
                                <label for="">Cambiar imagen</label>
                            </div>
                        </div>

                        <div class="row mb-3" >
                            <label for="imagen" class="col-md-4 col-form-label text-md-end">{{ __('Imagen del producto') }}</label>

                            <div class="col-md-6">
                                <input type="file" accept="image/png, .jpeg, .jpg" class="form-control" onchange="showPreview(event);" name="imagen" data-imagen="{{ $producto->imagen }}" autocomplete="off" id="file" autofocus>

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-end"></label>

                            <div class="col-md-6">
                                <div class="preview">
                                    <img id="file-ip-1-preview">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3" >
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Cambiar estado') }}</label>

                            <div class="col-md-6">
                               <select name="estado" class="form-control">
                                   <option value="2">Estado actual:
                                       @if ($producto->estado)
                                           Activo
                                       @else
                                           Inactivo
                                       @endif
                                   </option>
                                   <option value="1">Activo</option>
                                   <option value="0">Inactivo</option>
                               </select>

                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    {{ __('Editar producto') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection