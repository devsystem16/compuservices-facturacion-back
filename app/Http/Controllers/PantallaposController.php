<?php

namespace App\Http\Controllers;

use App\Models\Pantallapos;
use Illuminate\Http\Request;

class PantallaposController extends Controller
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
     * @param  \App\Models\Pantallapos  $pantallapos
     * @return \Illuminate\Http\Response
     */
    public function show(Pantallapos $pantallapos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pantallapos  $pantallapos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pantallapos $pantallapos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pantallapos  $pantallapos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pantallapos $pantallapos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pantallapos  $pantallapos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pantallapos $pantallapos)
    {
        //
    }


    public function obtenerAccesos($tipoUsuario)
    {
        return  Pantallapos::where('tipo_usuario_id', $tipoUsuario)->get();
    }
}
