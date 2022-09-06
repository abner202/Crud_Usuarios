@extends('theme.base')

@section('content')
   <div class="container py-5 text-center">



    <h1 >Listado de Usuarios</h1>
    <a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear usuario</a>
     
    @if (Session::has('mensaje'))
    <div class="alert-info my-5">
      {{Session::get('mensaje')}}
    </div>
    @endif
   
    <table class="table">
       <thead>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Teléfono</th>
           <th>E-mail</th>
           <th>Estado</th>
           <th>acciones</th>
       </thead>
       <tbody>

        @forelse ($usuarios as $detail)
        <tr>
            <td>{{$detail->nombre}}</td>
            <td>{{$detail->apellido}}</td>
            <td>{{$detail->telefono}}</td>
            <td>{{$detail->e_mail}}</td>
            <td>{{$detail->estado}}</td>
            <td>
                                
         <a href="{{route('usuario.edit', $detail )}}" class="btn btn-warning">Editar</a>
                    
            <form action="{{route('usuario.destroy', $detail)}}" method="post" class="d-inline">
                    
                @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este usuario')" >Eliminar</button>
            </form>

                
            </td>

            
         </tr>
        @empty
        <tr>
            <td colspan="3">No hay ningun registro de usuario actualmente</td>

        </tr>            
        @endforelse

       </tbody>
   </table>
 
     @if ($usuarios->count())
   {{$usuarios->links()}}    
@endif


</div>
@endsection