<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Facturas;
use App\Models\Detalles;
use App\Models\Creditos;
use App\Models\Productos;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Facturas::all();
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

        $facturas = Facturas::create($request->cabecera);

        foreach ($request->detalle as $detalle) {

            $producto = Productos::find($detalle["producto_id"]);
            $producto->stock = $producto->stock - $detalle["cantidad"];
            $producto->save();

            Detalles::create(
                [
                    'factura_id' => $facturas->id,
                    'producto_id' => $detalle["producto_id"],
                    'cantidad' => $detalle["cantidad"],
                    'subtotal' =>  $detalle["subtotal"],
                    'precio_tipo' =>   $detalle["precio_tipo"]
                ]
            );
        }

        return  ["estado" =>  200,  "factura" => $facturas];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Facturas::find($id);
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
        return   Facturas::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facturas::findOrFail($id)->delete();
    }

    public function historiofacturas(Request $request)
    {

        $reporte = [];
        $facturas =  Facturas::select(
            'facturas.id',
            'clientes.nombres as cliente',
            'facturas.fecha',
            'facturas.subtotal',
            'facturas.iva',
            'facturas.total',
            'facturas.observacion',
            'facturas.estado'
        )
            ->join('clientes', 'clientes.id', 'facturas.cliente_id')
            ->orderBy('facturas.created_at', 'desc')
            ->get();;

        foreach ($facturas as $factura) {
            $detalle = Detalles::select(
                'detalles.id',
                'productos.nombre as producto',
                'detalles.cantidad',
                'detalles.subtotal',
                'detalles.precio_tipo'
            )
                ->join('productos', 'productos.id', 'detalles.producto_id')
                ->where('factura_id', $factura->id)->get();
            $factura->detalles =  $detalle;
            array_push($reporte, [
                'factura' => $factura
            ]);
        }
        return   $reporte;
    }


    public function reimpresion($id)
    {
        $reporte = [];

        $facturas =  Facturas::select(
            'facturas.id',
            'facturas.cliente_id',
            'facturas.fecha',
            'facturas.subtotal',
            'facturas.iva',
            'facturas.total',
            'facturas.observacion',
            'facturas.es_credito',
            'facturas.fecha',
            'facturas.estado'
        )
            ->where('facturas.id', '=', $id)
            ->orderBy('facturas.created_at', 'desc')
            ->first();

        $cliente =  Clientes::select('cedula', 'nombres', 'telefono', 'direccion')
            ->where('id', $facturas->cliente_id)->first();


        $totales =  ["subtotal" => $facturas->subtotal, "iva"  => $facturas->iva, "total" =>  $facturas->total, "observaciones" =>  $facturas->observacion];

        $detalle = Detalles::select(
            'detalles.id',
            'productos.nombre as producto',
            'detalles.cantidad',
            'detalles.subtotal as total',
            'detalles.precio_tipo',
            'productos.precio_publico',
            'productos.precio_tecnico',
            'productos.precio_distribuidor'
        )
            ->join('productos', 'productos.id', 'detalles.producto_id')
            ->where('factura_id', $facturas->id)->get();

        $facturas->detalles =  $detalle;
        $facturas->cliente =  $cliente;
        $facturas->totales =    $totales;
        array_push($reporte, [
            'factura' => $facturas
        ]);



        return $reporte[0];
    }


    public function anularFactura(Request $request)
    {
        $factura = Facturas::findOrFail($request->idFactura);



        if ($factura->estado  == "Anulada") {
            return    ["codigo" => 203, "mensaje"   => "Factura ya se encuentra anulada"];
        }

        if ($factura->es_credito == 1) {
            // $credito = Creditos::findOrFail($factura->credito_id);
            Creditos::findOrFail($factura->credito_id)->delete();
        }


        // if ($factura->estado  == "credito") {
        //     return    ["codigo" => 203, "mensaje"   => "No se permite anular un Credito"];
        // }

        // if ($factura->estado  == "credito (PAGADO)") {
        //     return    ["codigo" => 203, "mensaje"   => "No se permite anular un Credito Pagado"];
        // }

        $factura->estado = "Anulada";
        $factura->save();



        $detalles =  Detalles::where("factura_id",  $factura->id)->get();

        foreach ($detalles as $detalle) {
            $producto =  Productos::find($detalle->producto_id);
            $producto->stock =  $producto->stock  + $detalle->cantidad;
            $producto->save();
        }


        return    ["codigo" => 200, "mensaje"   => "Factura Anulada correctamente."];
    }

    public function historiofacturasFilter(Request $request)
    {



        $reporte = [];
        $facturas =  Facturas::select(
            'facturas.id',
            'clientes.nombres as cliente',
            'facturas.fecha',
            'facturas.subtotal',
            'facturas.iva',
            'facturas.total',
            'facturas.observacion',
            'facturas.estado'
        )
            ->join('clientes', 'clientes.id', 'facturas.cliente_id')
            ->orderBy('facturas.created_at', 'desc')

            ->where('clientes.nombres', 'LIKE', '%' . $request->filter . '%')
            ->orWhere('facturas.id', 'LIKE', '%' . $request->filter . '%')
            ->get();

        foreach ($facturas as $factura) {
            $detalle = Detalles::select(
                'detalles.id',
                'productos.nombre as producto',
                'detalles.cantidad',
                'detalles.subtotal',
                'detalles.precio_tipo'
            )
                ->join('productos', 'productos.id', 'detalles.producto_id')
                ->where('factura_id', $factura->id)->get();
            $factura->detalles =  $detalle;
            array_push($reporte, [
                'factura' => $factura
            ]);
        }
        return   $reporte;
    }




    public function reporteDiario()
    {
        $reporteDiario =  DB::select(' call reporteDiario();');




        // $facturas = Facturas::select('facturas.id', 'facturas.observacion', 'detalles.cantidad', 'detalles.subtotal',  'productos.nombre as producto', 'detalles.precio_tipo',)
        //     ->join('detalles', 'detalles.factura_id', '=', 'facturas.id')
        //     ->join('productos', 'productos.id', '=', 'detalles.producto_id')
        //     ->get();


        $productosStock =  Productos::select(
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
            ->orderBy('updated_at', 'desc')
            ->where('stock', '<=', 2)
            ->get();


        $clientes = DB::table('clientes as c')
            ->selectRaw('count(*) as cantidadclientes')
            ->where('deleted_at', '=',  null)
            ->first();


        $date = Carbon::now();
        $fecha_hoy = Carbon::parse($date->toDateTimeString())->format('Y-m-d');


        $creditos = Creditos::where('creditos.saldo', '>', 0)
            ->select(DB::raw('count(*) as totalCreditos'))
            ->first();


        $facturas = Facturas::where('fecha', '>=', $fecha_hoy)
            ->select(DB::raw('count(*) as NumeroFacturas'))
            ->where('estado', '=', 'cerrada')
            ->first();


        $totalVentas = 0;
        foreach ($reporteDiario as $item) {
            $totalVentas  =  $totalVentas +  $item->valor;
        }


        return  ["estado" =>  200, "productosStockBajo"  => $productosStock, "NumeroCreditos"  => $creditos->totalCreditos, "NumeroFacturas" =>  $facturas->NumeroFacturas, "clientes" =>  $clientes->cantidadclientes, "totalVendido" =>  $totalVentas, "desglose" =>  $reporteDiario];
    }
}
