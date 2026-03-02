<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return $productos;
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
        return Productos::find($id)->update($request->all());
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
            $response = Productos::findOrFail($id)->delete();
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
            'productos.id',
            'productos.nombre',
            'productos.precio_publico',
            'productos.precio_tecnico',
            'productos.precio_compra',
            'productos.precio_distribuidor',
            'productos.codigo_barra',
            'productos.descripcion',
            'productos.stock',
            'productos.proveedor_id',
            'proveedores.nombre as proveedor_nombre',
            'productos.descripcion as proveedor_codigo'
        )
            ->leftJoin('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
            ->orderBy('productos.created_at', 'desc')
            ->take($limite)
            ->get();

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
            'codigo_barra',
            'stock'
        )
            ->orderBy('created_at', 'desc')
            ->take($limite)->get();
    }
    public function nextId()
    {
        $database = DB::getDatabaseName();
        $result = DB::select(
            "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = 'productos'",
            [$database]
        );

        $nextId = $result[0]->AUTO_INCREMENT ?? 1;

        return response()->json([
            'codigo' => 200,
            'next_id' => $nextId,
            'codigo_barra' => '00' . $nextId
        ]);
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
