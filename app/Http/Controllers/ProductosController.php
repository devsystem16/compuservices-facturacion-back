<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productos::all();
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
        $productos = Productos::create($request->all());
        return  $productos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Productos::find($id);
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
        return   Productos::find($id)->update($request->all());
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
            $response =  Productos::findOrFail($id)->delete();
        } catch (\Exception $e) {
            $response = 0;
        }
        if ($response == 1) {
            return ["estado" => 200, "mensaje" => "Producto Eliminado."];
        } else {
            return ["estado" => 401, "mensaje" => "Ocurrió un error."];
        }
    }

    public function listado($limite)
    {
        return Productos::select(
            'id',
            'nombre',
            'descripcion',
            'precio_publico',
            'precio_tecnico',
            'precio_compra',
            'precio_distribuidor',
            'stock'
        )
            ->orderBy('updated_at', 'desc')
            ->take($limite)->get();
    }

    public function listadoStock($limite)
    {
        return Productos::select(
            'id',
            'nombre',
            'descripcion',
            'precio_publico',
            'precio_tecnico',
            'precio_compra',
            'precio_distribuidor',
            'stock'
        )
            ->orderBy('updated_at', 'desc')
            ->take($limite)->get();
    }
    public function buscarProducto($texto = '')
    {
        return Productos::select(
            'id as codigo',
            'nombre',
            'descripcion',
            'precio_publico',
            'precio_tecnico',
            'precio_compra',
            'precio_distribuidor',
            'stock'
        )
            ->where('nombre', 'like', '%' . $texto . '%')
            ->orderBy('nombre', 'asc')->get();
    }
}
