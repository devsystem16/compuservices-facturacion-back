<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\DetalleCreditos;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        $creditos = Creditos::create($request->cabecera);


        foreach ($request->detalle as $detalle) {
            DetalleCreditos::create(
                [
                    'credito_id' => $creditos->id,
                    'abono' => $detalle["abono"],
                    'fecha' => $detalle["fecha"],
                    'comentario' =>  $detalle["comentario"]
                ]
            );
        }
        return  ["estado" =>  200,  "credito" =>     $creditos];
        //['credito_id','abono','fecha','comentario' ]
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
        }

        $credito->saldo = $saldo;
        $credito->save();

        $now = new \DateTime();
        DetalleCreditos::create(
            [
                'credito_id' => $credito->id,
                'abono' => $request->abono,
                'fecha' => $now->format('Y-m-d'),
                'comentario' =>  "Abono"
            ]
        );

        return   ["totalCredito"  =>  $credito->total, "totalPagado" => $valorMasAbono, "saldo" => $saldo, "cambio" =>  $cambio];
    }

    public function ListadoCreditos()
    {



        $creditos = Creditos::select('creditos.id as id',  'creditos.cliente_id', 'creditos.fecha', 'creditos.detalle', 'creditos.saldo', 'creditos.total', 'clientes.nombres as cliente')
            ->join('clientes', 'creditos.cliente_id', 'clientes.id')
            ->get();


        $collection = collect([]);

        foreach ($creditos as $credito) {

            $detalles =   DetalleCreditos::where('credito_id', $credito->id)->get();
            $abonado = 0;
            foreach ($detalles as $detalle) {
                $abonado =   $abonado + $detalle->abono;
            }
            $collection->push([
                "id" => $credito->id,
                "cliente" => $credito->cliente,
                "fecha" => $credito->fecha,
                "detalle" => $credito->detalle,
                "saldo" => $credito->saldo,
                "total" => $credito->total,
                "abono" => $abonado
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
