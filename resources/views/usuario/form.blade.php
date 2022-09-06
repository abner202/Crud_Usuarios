@extends('theme.base')

@section('content')
   <div class="container py-5 text-center">

      @if (isset($usuario))
      <h1>Editar Usuario</h1>  
         
  @else
     <h1>Crear Usuario</h1>    
  @endif


  @if (isset($usuario))
  <form action="{{route('usuario.update',$usuario)}}" method="post">  
   @method('PUT')         
  @else
  <form action="{{route('usuario.store')}}" method="post">   
  @endif

   
  
     @csrf
     <div class="md-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre de Usuario" value="{{old('nombre') ?? @$usuario->nombre}}">
        <p class="form-text">Escriba el nombre del usuario</p>
        @error('nombre')
        <p class="from-text text-danger">{{$message}}</p>
    @enderror

     </div>

     <div class="md-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Apellido de Usuario"value="{{old('apellido') ?? @$usuario->apellido}}">
        <p class="form-text">Escriba el apellido del usuario</p>
        @error('apellido')
        <p class="from-text text-danger">{{$message}}</p>
    @enderror

     </div>

     <div class="md-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="text" name="telefono" class="form-control" placeholder="telefono de Usuario" value="{{old('telefono') ?? @$usuario->telefono}}">
        <p class="form-text">Escriba el telefono del usuario</p>
        @error('telefono')
        <p class="from-text text-danger">{{$message}}</p>
    @enderror

     </div>

     <div class="md-3">
        <label for="e_mail" class="form-label">E-mail</label>
        <input type="text" name="e_mail" class="form-control" placeholder="E-mail de Usuario" value="{{old('e_mail') ?? @$usuario->e_mail}}">
        <p class="form-text">Escriba el E-mail del usuario</p>
        @error('e_mail')
        <p class="from-text text-danger">{{$message}}</p>
    @enderror

     </div>

     <div class="md-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" name="estado" class="form-control" placeholder="Estado de Usuario" value="{{old('estado') ?? @$usuario->estado}}">
        <p class="form-text">Escriba el estado del usuario</p>
        @error('estado')
        <p class="from-text text-danger">{{$message}}</p>
    @enderror
     </div>


   @if (isset($usuario))
   <button type="submit" class="btn btn-info">Editar Usuario</button>
         
   @else
   <button type="submit" class="btn btn-info">Guardar Usuario</button>  
   @endif
      

     

  </form>
</div>
@endsection