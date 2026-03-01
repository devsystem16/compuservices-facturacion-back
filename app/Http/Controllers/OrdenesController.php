<?php

namespace App\Http\Controllers;

use App\Models\AbonoOrdenes;
use App\Models\Ordenes;
use App\Models\OrdenHistorial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {


    //     $ordenes = Ordenes::select('ordenes.*', 'clientes.nombres as cliente', 'usu.nombres as update_work',  'usu1.nombres as last_user')
    //         ->join('clientes', 'ordenes.cliente_id', 'clientes.id')
    //         ->join('usuarios as usu', 'ordenes.user_update_work', 'usu.id')
    //         ->join('usuarios as usu1', 'ordenes.last_user_update', 'usu1.id')
    //         ->orderBy('ordenes.fecha', 'desc')
    //         ->orderBy('ordenes.id', 'desc')
    //         ->where('ordenes.estado', '=', 1)
    //         ->get();

    //     return    $ordenes;
    // }


    public function index()
    {
        $ordenes = Ordenes::select(
            'ordenes.id',
            'ordenes.cliente_id',
            'ordenes.usuario_id',
            'ordenes.fecha',
            'ordenes.equipo',
            'ordenes.marca',
            'ordenes.modelo',
            'ordenes.serie',
            'ordenes.falla',
            'ordenes.trabajo',
            'ordenes.total',
            'ordenes.saldo',
            'ordenes.abono',
            'ordenes.observacion',
            'ordenes.camara',
            'ordenes.teclado',
            'ordenes.microfono',
            'ordenes.parlantes',
            'ordenes.estado',
            'ordenes.estadoOrden',
            DB::raw("IFNULL(ordenes.estado_reparacion, 'N/A') as estado_reparacion"),
            'ordenes.last_user_update',
            'ordenes.user_update_work',
            'ordenes.factura_relacionada',
            'ordenes.periodo_id',
            'ordenes.created_at',
            'ordenes.updated_at',
            'ordenes.deleted_at',
            'clientes.nombres as cliente',
            'clientes.telefono as telefono_cliente',
            'usu.nombres as update_work',
            'usu1.nombres as last_user'
        )
            ->join('clientes', 'ordenes.cliente_id', '=', 'clientes.id')
            ->leftJoin('usuarios as usu', 'ordenes.user_update_work', '=', 'usu.id')
            ->leftJoin('usuarios as usu1', 'ordenes.last_user_update', '=', 'usu1.id')
            ->where('ordenes.estado', '=', 1)
            ->where('ordenes.fecha', '>=', '2024-01-01 09:53:34') // 👈 filtro agregado
            ->orderBy('ordenes.fecha', 'desc')
            ->orderBy('ordenes.id', 'desc')
            ->get();

        return $ordenes;
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
        $ordenes = Ordenes::create($request->all());
        foreach ($request->abono_ordenes as $detalle) {
            AbonoOrdenes::create(
                [
                    'orden_id' => $ordenes->id,
                    'abono' => $detalle["abono"],
                    'fecha' => $detalle["fecha"],
                    'comentario' => $detalle["comentario"]
                ]
            );
        }

        // Historial: ingreso registrado
        OrdenHistorial::registrar($ordenes->id, 'ingreso_registrado', 'Ingreso registrado en el sistema', $request->usuario_id);

        return $ordenes;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return Ordenes::find($id);
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
        $orden = Ordenes::find($id);
        $trabajoAnterior = $orden->trabajo;
        $totalAnterior = $orden->total;

        $orden->update($request->all());

        // Historial: trabajo actualizado
        if ($request->has('trabajo') && $request->trabajo !== $trabajoAnterior) {
            $evento = (empty($trabajoAnterior) || $trabajoAnterior === '')
                ? 'diagnostico_iniciado'
                : 'trabajo_actualizado';
            OrdenHistorial::registrar($orden->id, $evento, $request->trabajo, $request->user_update_work ?? $request->last_user_update);

            // Si es primera vez que se escribe trabajo, pasar a en_proceso
            if ($evento === 'diagnostico_iniciado' && $orden->estado_reparacion === 'pendiente') {
                $orden->update(['estado_reparacion' => 'en_proceso']);
            }
        }

        // Historial: total definido
        if ($request->has('total') && $request->total != $totalAnterior && $request->total > 0) {
            OrdenHistorial::registrar($orden->id, 'total_definido', 'Total: $' . number_format($request->total, 2), $request->user_update_work ?? $request->last_user_update);
        }

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordenes::findOrFail($id)->delete();
    }

    public function listado($limite)
    {
        return Ordenes::take($limite)->orderBy('updated_at', 'desc')->get();
    }

    public function abonar(Request $request)
    {

        $orden = Ordenes::findOrFail($request->orden_id);
        $detalles = AbonoOrdenes::where("orden_id", $request->orden_id)->get();


        $totalPagado = 0;
        foreach ($detalles as $detalle) {
            $totalPagado = $totalPagado + $detalle->abono;
        }

        $valorMasAbono = $totalPagado + $request->abono;
        $saldo = $orden->total - $valorMasAbono;

        $cambio = 0;

        if ($valorMasAbono >= $orden->total) {
            $cambio = $valorMasAbono - $orden->total;
            $valorMasAbono = $orden->total;
            $saldo = 0;
        }

        $orden->saldo = $saldo;
        $orden->abono = $valorMasAbono;
        $orden->save();

        $date = Carbon::now();
        AbonoOrdenes::create(
            [
                'orden_id' => $orden->id,
                'abono' => $request->abono,
                'fecha' => date_format($date, "Y-m-d"),
                'comentario' => "Abono"
            ]
        );


        // Historial: abono registrado
        OrdenHistorial::registrar($orden->id, 'abono_registrado', 'Abono de $' . number_format($request->abono, 2));

        return ["totalCredito" => $orden->total, "totalPagado" => $valorMasAbono, "saldo" => $saldo, "cambio" => $cambio];
    }

    public function actualizarTotal(Request $request)
    {
        $orden = Ordenes::findOrFail($request->orden_id);
        $totalAnterior = $orden->total;
        $orden->total = $request->total;
        $abono = $orden->abono;
        $orden->saldo = $orden->total - $abono;
        $orden->save();

        // Historial: total definido
        if ($request->total != $totalAnterior && $request->total > 0) {
            OrdenHistorial::registrar($orden->id, 'total_definido', 'Total: $' . number_format($request->total, 2));
        }

        return ["codigo" => 200, "mensaje" => "Total actualizado", "orden" => $orden];
    }
}
