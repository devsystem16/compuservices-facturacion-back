<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\DetalleCreditos;
use App\Models\Detalles;
use App\Models\Facturas;
use App\Models\FormaPago;
use App\Models\FormaPagoFactura;
use App\Models\Ordenes;
use App\Models\Periodo;
use App\Models\Reporte;
use App\Models\Retiros;
use App\Models\Usuarios;
use Exception;
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

    public function totalPorFormasPago(Request $request)
    {


        $idPeriodo = -1;
        try {
            $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
            $idPeriodo = $periodoActivo->id;
        } catch (Exception $e) {
            $idPeriodo =  -1;
        }



        // $periodoActivo = Periodo::where('estado', 'Abierto')->first();


        $facturas = DetalleCreditos::join('forma_pagos', 'forma_pagos.id', '=', 'detalle_creditos.forma_pago_id')
            ->join('creditos', 'creditos.id', '=', 'detalle_creditos.credito_id')
            ->leftJoin('facturas', 'facturas.credito_id', '=', 'creditos.id')
            // ->whereDate('detalle_creditos.fecha', '=', now()->format('Y-m-d'))
            ->select('forma_pagos.id as forma_pago_id',  'forma_pagos.label', DB::raw('SUM(detalle_creditos.abono) as total'))
            ->where('facturas.estado', '<>',  'Anulada')
            ->where('detalle_creditos.periodo_id', '=',    $idPeriodo)

            ->groupBy('forma_pagos.id')
            ->get();


        $creditos = FormaPagoFactura::join('forma_pagos', 'forma_pagos.id', '=', 'forma_pago_facturas.forma_pago_id')
            ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            // ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->select('forma_pagos.id as forma_pago_id',  'forma_pagos.label', DB::raw('SUM(forma_pago_facturas.valor) as total'))
            ->where('facturas.es_credito', '=', 0)
            ->where('facturas.estado', '<>',  'Anulada')
            ->where('facturas.periodo_id', '=',   $idPeriodo)
            ->groupBy('forma_pagos.id')
            ->get();

        // Combinar los resultados en un solo arreglo
        $resultados = $facturas->concat($creditos)->toArray();

        // Agrupar por forma_pago_id y sumar los totales correspondientes
        $agrupados = collect($resultados)->groupBy('forma_pago_id')->map(function ($grupo) {
            $sumaTotal = $grupo->sum('total');
            $primerElemento = $grupo->first();

            return [
                'forma_pago_id' => $primerElemento['forma_pago_id'],
                'label' => $primerElemento['label'],
                'total' => $sumaTotal,
            ];
        })->values()->all();



        $sumaValorRetiro = Retiros::where('periodo_id',  $idPeriodo)->sum('valorRetiro');

        return ["reporteFormasPago" => $agrupados, "totalRetiros"  => $sumaValorRetiro];





        $factura = FormaPagoFactura::with('FormaPago')
            ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            ->select('forma_pago_id', DB::raw('SUM(valor) as total'))
            ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->where('facturas.es_credito', '=', 0)
            ->groupBy('forma_pago_id')
            ->get();


        $credito = FormaPagoFactura::with('FormaPago')
            ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            ->leftJoin('detalle_creditos', 'facturas.credito_id', '=', 'detalle_creditos.credito_id')
            ->leftJoin('forma_pagos', function ($join) {
                $join->on('forma_pagos.id', '=', 'detalle_creditos.forma_pago_id');
            })
            ->select('forma_pagos.id as forma_pago_id', DB::raw('SUM(detalle_creditos.abono) as total'))
            ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->where('facturas.es_credito', '=', 1)
            ->groupBy('forma_pagos.id')
            ->get();

        // Unificar los resultados y sumar las formas de pago por ID repetido
        $unificado = $factura->concat($credito)->groupBy('forma_pago_id')->map(function ($group) {
            return [
                'forma_pago_id' => $group->first()->forma_pago_id,
                'total' => $group->sum('total'),
                'forma_pago' => $group->first()->FormaPago
            ];
        })->values();





        return  $unificado;




        // $sumaPorFormaPago = FormaPagoFactura::with('FormaPago')
        //     ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
        //     ->select('forma_pago_id', DB::raw('SUM(valor) as total'))
        //     ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
        //     ->where('facturas.es_credito', '=', 0)
        //     ->groupBy('forma_pago_id')
        //     ->get();

        $factura = FormaPagoFactura::with('FormaPago')
            ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            ->select('forma_pago_id', DB::raw('SUM(valor) as total'))
            ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->where('facturas.es_credito', '=', 0)
            ->groupBy('forma_pago_id')
            ->get();


        $credito = FormaPagoFactura::with('FormaPago')
            ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            ->leftJoin('detalle_creditos', 'facturas.credito_id', '=', 'detalle_creditos.credito_id')
            ->leftJoin('forma_pagos', function ($join) {
                $join->on('forma_pagos.id', '=', 'detalle_creditos.forma_pago_id');
            })
            ->select('forma_pagos.id as forma_pago_id', DB::raw('SUM(detalle_creditos.abono) as total'))
            ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->where('facturas.es_credito', '=', 1)
            ->groupBy('forma_pagos.id')
            ->get();



        return ["facturas" =>  $factura, "Credito" =>  $credito];





        // $sumaPorFormaPago = FormaPagoFactura::with('FormaPago')
        //     ->join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
        //     ->leftJoin('detalle_creditos', 'facturas.credito_id', '=', 'detalle_creditos.credito_id')
        //     ->leftJoin('forma_pagos', function ($join) {
        //         $join->on('forma_pagos.id', '=', 'forma_pago_facturas.forma_pago_id')
        //             ->orOn('forma_pagos.id', '=', 'detalle_creditos.forma_pago_id');
        //     })
        //     ->select('forma_pagos.label', DB::raw('SUM(CASE 
        //             WHEN forma_pagos.cash >= 0 THEN 
        //                 CASE 
        //                     WHEN facturas.es_credito = 1 THEN detalle_creditos.abono 
        //                     ELSE forma_pago_facturas.valor 
        //                 END
        //             ELSE 
        //                 forma_pago_facturas.valor 
        //             END) as total'))
        //     ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
        //     ->groupBy('forma_pagos.label')
        //     ->get();

        /*
        $sumaPorFormaPago = FormaPagoFactura::join('facturas', 'facturas.id', '=', 'forma_pago_facturas.factura_id')
            ->leftJoin('detalle_creditos', 'facturas.credito_id', '=', 'detalle_creditos.credito_id')
            ->leftJoin('forma_pagos', function ($join) {
                $join->on('forma_pagos.id', '=', 'forma_pago_facturas.forma_pago_id')
                    ->orOn('forma_pagos.id', '=', 'detalle_creditos.forma_pago_id');
            })
            ->select('forma_pagos.nombre', DB::raw('SUM(CASE 
                    WHEN facturas.es_credito = 1 THEN detalle_creditos.abono 
                    ELSE forma_pago_facturas.valor 
                END) as total'))

            // ->select('forma_pagos.nombre', DB::raw('SUM(CASE 
            //         WHEN forma_pagos.cash >= 0 THEN 
            //             CASE 
            //                 WHEN facturas.es_credito = 1 THEN detalle_creditos.abono 
            //                 ELSE forma_pago_facturas.valor 
            //             END
            //         ELSE 
            //             forma_pago_facturas.valor 
            //         END) as total'))
            ->whereDate('facturas.fecha', '=', now()->format('Y-m-d'))
            ->groupBy('forma_pagos.nombre')
            ->get();

 */
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
