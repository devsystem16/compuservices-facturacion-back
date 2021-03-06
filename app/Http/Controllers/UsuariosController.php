<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }

    public function login(Request $request)
    {


        $acceso = [
            "login" => 0,
            "user_id" => 0,
            "usuario" =>   "no registrado",
            "tipousuario_id" => 0,
            "tipo" =>  "no registrado",
        ];
        $usuario =   Usuarios::select('usuarios.id as user_id',  'usuarios.usuario', 'usuarios.nombres', 'tipo_usuarios.tipo', 'tipo_usuarios.id as tipousuario_id')
            ->join('tipo_usuarios', 'usuarios.tipo_usuarios_id', 'tipo_usuarios.id')
            ->where('usuarios.usuario', '=', $request->user)
            ->where('usuarios.pass', '=', $request->pass)
            ->first();
        if (isset($usuario->usuario)) {
            $acceso = [
                "login" => 1,
                "user_id" =>  $usuario->user_id,
                "usuario" =>   $usuario->usuario,
                "nombres" =>   $usuario->nombres,
                "tipousuario_id" => $usuario->tipousuario_id,
                "tipo" =>   $usuario->tipo,
            ];
        }
        return   $acceso;
    }
}
