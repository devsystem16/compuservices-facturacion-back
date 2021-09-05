<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clientes::all();
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
        $cliente = Clientes::where('cedula', '=',  $request->cedula)->first();
        if ($cliente != null)
            return  ["estado" => 203, "mensaje" => "El cliente ya existe.", "cliente" => $cliente];

        $cliente = Clientes::create($request->all());
        return  ["estado" => 201, "mensaje" => "Cliente Regitrado correctamente.", "cliente" => $cliente];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Clientes::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return   Clientes::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response =  Clientes::findOrFail($id)->delete();
        } catch (\Exception $e) {
            $response = 0;
        }
        if ($response == 1) {
            return ["estado" => 200, "mensaje" => "Cliente Eliminado."];
        } else {
            return ["estado" => 401, "mensaje" => "Ocurrió un error."];
        }
    }


    public function listado($limite)
    {
        return Clientes::select('id', 'cedula', 'nombres', 'telefono', 'direccion', 'correo', 'observacion')
            ->orderBy('updated_at', 'desc')
            ->take($limite)
            ->get();
    }
}
