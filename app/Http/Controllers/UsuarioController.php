<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=Usuario::paginate(5);
        return view('usuario.index')        
             ->with('usuarios', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => 'required|max:30',
            "apellido" => 'required|max:30',
            "telefono" => 'required|max:12',
            "e_mail" => 'required|max:30',
            "estado" => 'required|max:20'
          ]);
        $usuario=Usuario::create($request->only('nombre','apellido','telefono','e_mail','telefono','estado'));
         Session::flash('mensaje', 'Usuario creado con exito !');
         return redirect()->route('usuario.index');
        

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.form')
          ->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
            $request->validate([
                "nombre" => 'required|max:30',
                "apellido" => 'required|max:30',
                "telefono" => 'required|max:12',
                "e_mail" => 'required|max:30',
                "estado" => 'required|max:20'
            ]);
              
            $usuario->nombre = $request['nombre'];
            $usuario->apellido = $request['apellido'];
            $usuario->telefono = $request['telefono'];
            $usuario->e_mail = $request['e_mail'];
            $usuario->estado = $request['estado'];
            $usuario->save;


            Session::flash('mensaje', 'Usuario editado con exito !');
            return redirect()->route('usuario.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario ->delete();
        Session::flash('mensaje', 'Usuario eliminado con exito !');
        return redirect()->route('usuario.index');
    }
}
