<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\Detalles;
use App\Models\Facturas;
use App\Models\Ordenes;
use App\Models\Reporte;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
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
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }


    public function ingresosXempleado(Request $request)
    {


        $row = [];
        //Usuario, Total Ingresos, Ventas  
        $usuarios =  Usuarios::all();
        $reporte = [];
        $totalGlobal = 0;
        foreach ($usuarios as $usuario) {
            $ordenes = Ordenes::select(
                'ordenes.id as id_orden',
                'ordenes.usuario_id as usuarioID',
                'ordenes.fecha as fecha',
                'usuarios.nombres as usuario',
                'ordenes.observacion'
            )
                ->selectRaw('sum(abono_ordenes.abono) as totalAbono')
                ->leftJoin('abono_ordenes', 'abono_ordenes.orden_id', '=', 'ordenes.id')
                ->whereBetween('ordenes.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('ordenes.usuario_id', '=',  $usuario->id)
                ->join('usuarios', 'usuarios.id', 'ordenes.usuario_id')
                ->where('ordenes.estado', '=',  '1')
                ->groupBy('abono_ordenes.orden_id', 'ordenes.id')
                ->distinct()
                ->get();

            $usuario = $usuario->nombres;
            $total = 0;

            foreach ($ordenes as $orden) {
                $totalGlobal +=    $orden->totalAbono;
                $total +=     $orden->totalAbono;
            }
            $row  = ["usuario" =>  $usuario, "cantidad_ordenes" => $ordenes->count(), "total_venta" =>  $total];

            array_push(
                $reporte,
                $row
            );
        }


        $grafico = [];
        $users = [];
        $ordenes = [];

        $array = (array)collect($reporte)->sortBy('cantidad_ordenes')->reverse()->toArray();
        $resultsOrdenado = [];
        $conteo = 0;


        foreach ($array as $a) {
            $users[$conteo] =  $a["usuario"] . "(" . $a["cantidad_ordenes"] . ")";
            $ordenes[$conteo] =  $a["cantidad_ordenes"];
            $conteo++;
            array_push(
                $resultsOrdenado,
                [
                    "usuario" => $a["usuario"],
                    "cantidad_ordenes" => $a["cantidad_ordenes"],
                    "total_venta" => $a["total_venta"],
                ]
            );
        }

        $grafico = ["labels" => (array) $users, "series" => $ordenes];
        return ["total_ventas" => $totalGlobal, "ventasEmpleados"  => $resultsOrdenado, "grafico" => $grafico];
    }
    public function ventasDiarias(Request $request)
    {



        $reporte =  [];
        $total_ventas = 0;


        $facturas =  Facturas::select(
            'facturas.id  as idControl',
            'facturas.fecha',
            'clientes.nombres as cliente',
            'facturas.observacion',
            'facturas.total as totalAbono',
        )
            ->selectRaw("'Factura' as tipo")
            ->join('clientes', 'clientes.id', 'facturas.cliente_id')
            ->orderBy('facturas.created_at', 'desc')
            ->whereBetween('facturas.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('facturas.estado', '=',  'cerrada')
            // ->orWhere('facturas.id', 'LIKE', '%' . $request->filter . '%')
            ->get();
        $ordenes =  Ordenes::select(
            'ordenes.id as idControl',
            'ordenes.fecha as fecha',
            'clientes.nombres as cliente',
            'ordenes.observacion'
        )
            ->selectRaw('sum(abono_ordenes.abono) as totalAbono')
            ->selectRaw("'Ingreso' as tipo")
            ->join('abono_ordenes', 'abono_ordenes.orden_id', 'ordenes.id')
            ->whereBetween('abono_ordenes.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->join('clientes', 'clientes.id', 'ordenes.cliente_id')
            ->where('ordenes.estado', '=',  '1')
            ->groupBy('abono_ordenes.orden_id')
            ->get();


        $creditos =    Creditos::select(
            'creditos.id as idControl',
            'creditos.fecha',
            'clientes.nombres as cliente',
            'creditos.detalle as observacion'
        )
            ->selectRaw('sum(detalle_creditos.abono) as totalAbono')
            ->selectRaw("'Crédito' as tipo")
            ->join('detalle_creditos', 'detalle_creditos.credito_id', 'creditos.id')
            ->join('clientes', 'clientes.id', 'creditos.cliente_id')
            ->whereBetween('detalle_creditos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->groupBy('detalle_creditos.credito_id')
            ->get();


        foreach ($facturas as $factura) {
            $total_ventas +=  $factura->totalAbono;
        }
        foreach ($ordenes as $orden) {
            $total_ventas +=  $orden->totalAbono;
        }
        foreach ($creditos as $credito) {
            $total_ventas +=  $credito->totalAbono;
        }


        return ["total_ventas" =>  $total_ventas, "facturas" =>     $facturas, "ordenes" => $ordenes, "creditos" => $creditos];

        // foreach ($facturas as $factura) {
        //     $detalle = Detalles::select(
        //         'detalles.id',
        //         'productos.nombre as producto',
        //         'detalles.cantidad',
        //         'detalles.subtotal',
        //         'detalles.precio_tipo'
        //     )
        //         ->join('productos', 'productos.id', 'detalles.producto_id')
        //         ->where('factura_id', $factura->id)->get();
        //     $factura->detalles =  $detalle;
        //     array_push($reporte, [
        //         'factura' => $factura
        //     ]);
        // }


        return     $reporte;
    }
}
