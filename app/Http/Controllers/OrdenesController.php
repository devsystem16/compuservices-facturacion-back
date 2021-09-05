<?php

namespace App\Http\Controllers;

use App\Models\AbonoOrdenes;
use App\Models\Ordenes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $ordenes = Ordenes::select('ordenes.*', 'clientes.nombres as cliente')
            ->join('clientes', 'ordenes.cliente_id', 'clientes.id')
            ->orderBy('ordenes.updated_at', 'desc')
            ->where('ordenes.estado', '=', 1)
            ->get();

        return    $ordenes;
        // return Ordenes::orderBy('updated_at', 'desc')
        //     ->where('estado', '=', 1)
        //     ->get();
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
                    'comentario' =>  $detalle["comentario"]
                ]
            );
        }
        return  $ordenes;
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

        return   Ordenes::find($id)->update($request->all());
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
        $detalles =  AbonoOrdenes::where("orden_id",   $request->orden_id)->get();


        $totalPagado = 0;
        foreach ($detalles as $detalle) {
            $totalPagado  =  $totalPagado +  $detalle->abono;
        }

        $valorMasAbono =  $totalPagado +  $request->abono;
        $saldo = $orden->total - $valorMasAbono;

        $cambio = 0;

        if ($valorMasAbono  >= $orden->total) {
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
                'fecha' =>  date_format($date, "Y-m-d"),
                'comentario' =>  "Abono"
            ]
        );


        return   ["totalCredito"  =>  $orden->total, "totalPagado" => $valorMasAbono, "saldo" => $saldo, "cambio" =>  $cambio];
    }
}
