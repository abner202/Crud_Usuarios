<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuario') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2>
                        Bienvenido!<br>
                        Sus credenciales son las siguientes:<br><br>

                        <th >Nombre: </th>{{ Auth::user()->name }}<br>
                        <th >Dirección: </th>{{ Auth::user()->direccion }}<br>
                        <th >Telefono: </th>{{ Auth::user()->telefono}}<br>
                        <th >Usuario: <img src="{{asset('storage').'/'.Auth::user()->fotografia}}" width="50px"><br>

                        
                    </h2>
                       
                    
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
