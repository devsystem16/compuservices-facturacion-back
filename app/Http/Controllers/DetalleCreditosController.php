<?php

namespace App\Http\Controllers;

use App\Models\DetalleCreditos;
use Illuminate\Http\Request;

class DetalleCreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DetalleCreditos::all();
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
        $detalleCreditos = DetalleCreditos::create($request->all());
       return  $detalleCreditos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DetalleCreditos::find($id);
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
        return   DetalleCreditos::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetalleCreditos::findOrFail($id)->delete();
    }

    public function actualizarFormaPago(Request $request, $id)
    {
        $request->validate([
            'forma_pago_id' => 'required|integer|exists:forma_pagos,id',
        ]);

        $detalle = DetalleCreditos::findOrFail($id);
        $detalle->forma_pago_id = $request->forma_pago_id;
        $detalle->save();

        // Puedes devolver también el objeto completo con la relación
        return response()->json([
            'message' => 'Forma de pago actualizada correctamente',
            'detalle' => $detalle->load('FormaPago')
        ]);
    }




}
