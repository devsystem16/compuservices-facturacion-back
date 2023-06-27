<?php

namespace App\Http\Controllers;

use App\Models\Creditos;

use App\Models\DetalleCreditos;
use App\Models\Detalles;
use App\Models\Facturas;
use App\Models\Periodo;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class CreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Creditos::all();
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
        try {
            DB::beginTransaction();

            $idPeriodo = -1;
            try {
                $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
                $idPeriodo = $periodoActivo->id;
            } catch (Exception $e) {
                $idPeriodo =  -1;
            }


            $creditos = Creditos::create($request->cabecera);

            foreach ($request->detalle as $detalle) {
                DetalleCreditos::create(
                    [
                        'credito_id' => $creditos->id,
                        'abono' => $detalle["abono"],
                        'fecha' => $detalle["fecha"],
                        'comentario' =>  $detalle["comentario"],
                        'periodo_id' =>    $idPeriodo
                    ]
                );
            }

            // En caso de tener formas de pago.
            $sumaPagos = 0;
            foreach ($request->formasPago as $formasPago) {
                if ($formasPago["valor"] > 0) {

                    $sumaPagos += $formasPago["valor"];
                    DetalleCreditos::create(
                        [
                            'credito_id' => $creditos->id,
                            'abono' => $formasPago["valor"],
                            'fecha' =>  now()->format('Y-m-d'),
                            'forma_pago_id' => $formasPago["id"],
                            'comentario' =>   "Abono-inmediato",
                            'periodo_id' =>    $idPeriodo
                        ]
                    );
                }
            }

            $saldo =  $creditos->total  -  $sumaPagos;
            $creditos->saldo =   $saldo;
            $creditos->save();

            DB::commit();
            return  ["estado" =>  200,  "credito" =>     $creditos];
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["estado" =>  400,  "credito" =>     []], 200);
        }
    }

    public function eliminarCredito($idCredito)
    {

        try {
            DB::beginTransaction();

            $factura = Facturas::where('credito_id', $idCredito)->first();
            $credito = Creditos::where('id', $idCredito)->first();
            $factura->estado = "Anulada";
            $factura->save();

            // ELiminar detalles de creditos (Abonos de pagos)
            $detallesCreditos =  DetalleCreditos::where("credito_id",  $idCredito)->get();
            foreach ($detallesCreditos as $detalleC) {
                $detalleC->delete();
            }

            // Devolver Stock en Productos.
            $detalles =  Detalles::where("factura_id",  $factura->id)->get();
            foreach ($detalles as $detalle) {
                $producto =  Productos::find($detalle->producto_id);
                $producto->stock =  $producto->stock  + $detalle->cantidad;
                $producto->save();
            }

            // anular Factura. 
            $factura->estado = "Anulada";
            $factura->save();
            // ELiminar Credito
            $credito->delete();

            DB::commit();
            return response()->json(["codigo" => 200, "Message"   => "Crédito Anulado correctamente."],  200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar"], 400);
        }
    }
    public function abonar(Request $request)
    {


        $credito = Creditos::findOrFail($request->credito_id);


        $detalles =  DetalleCreditos::where("credito_id",   $credito->id)->get();
        $totalPagado = 0;
        foreach ($detalles as $detalle) {
            $totalPagado  =  $totalPagado +  $detalle->abono;
        }
        $valorMasAbono =  $totalPagado +  $request->abono;
        $saldo = $credito->total - $valorMasAbono;

        $cambio = 0;

        if ($valorMasAbono  >= $credito->total) {
            $cambio = $valorMasAbono - $credito->total;
            $valorMasAbono = $credito->total;
            $saldo = 0;

            $factura = Facturas::where('credito_id',  $credito->id)->first();
            $factura->estado = "credito (PAGADO)";
            $factura->save();
        }

        $credito->saldo = $saldo;
        $credito->save();


        $date = Carbon::now();
        $fecha_hoy = Carbon::parse($date->toDateTimeString())->format('Y-m-d');

        DetalleCreditos::create(
            [
                'credito_id' => $credito->id,
                'abono' => $request->abono,
                'fecha' => $fecha_hoy,
                'forma_pago_id' => $request->forma_pago_id,
                'comentario' =>  "Abono",
                'periodo_id' =>  $request->periodo_id
            ]
        );

        return   ["totalCredito"  =>  $credito->total, "totalPagado" => $valorMasAbono, "saldo" => $saldo, "cambio" =>  $cambio];
    }

    public function ListadoCreditos()
    {

        $creditos = Creditos::select(
            'creditos.id as id',
            'creditos.cliente_id',
            'creditos.fecha',
            'creditos.detalle',
            'creditos.saldo',
            'creditos.total',
            'clientes.nombres as cliente',
            'clientes.telefono as telefono'
        )
            ->join('clientes', 'creditos.cliente_id', 'clientes.id')
            ->where('creditos.saldo', '>', 0)
            ->whereNull('creditos.deleted_at')
            ->orderBy('creditos.updated_at', 'desc')
            ->orderBy('creditos.fecha', 'desc')
            ->get();


        $collection = collect([]);

        foreach ($creditos as $credito) {

            $detalles =   DetalleCreditos::where('credito_id', $credito->id)->get();
            $factura =  Facturas::select(
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
                ->where('facturas.credito_id', '=', $credito->id)
                ->get();


            $pagos = DetalleCreditos::select(
                'detalle_creditos.id',
                'detalle_creditos.fecha',
                'detalle_creditos.abono',
                'detalle_creditos.comentario',
                'forma_pagos.label as forma_pago'
            )
                ->join('creditos', 'creditos.id', 'detalle_creditos.credito_id')
                ->Leftjoin('forma_pagos', 'forma_pagos.id', 'detalle_creditos.forma_pago_id')
                ->where('creditos.id', '=', $credito->id)
                ->get();



            $detalle = [];

            foreach ($factura as $fac) {
                $detalle = Detalles::select(
                    'detalles.id',
                    'productos.nombre as producto',
                    'detalles.cantidad',
                    'detalles.subtotal',
                    'detalles.precio_tipo'
                )
                    ->join('productos', 'productos.id', 'detalles.producto_id')
                    ->where('factura_id', $fac->id)->get();
                $fac->detalles =  $detalle;
            }




            $abonado = 0;
            foreach ($detalles as $detalle) {
                $abonado =   $abonado + $detalle->abono;
            }
            $collection->push([
                "id" => $credito->id,
                "cliente" => $credito->cliente,
                "telefono" => $credito->telefono,
                "fecha" => $credito->fecha,
                "detalle" => $credito->detalle,
                "saldo" => $credito->saldo,
                "total" => $credito->total,
                "abono" => $abonado,
                "pagos" => $pagos,
                "factura" => isset($factura[0]) ? $factura[0] : null

            ]);
        }
        return   $collection;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Creditos::find($id);
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
        return   Creditos::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Creditos::findOrFail($id)->delete();
    }
}
