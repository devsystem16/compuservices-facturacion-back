<?php

namespace App\Http\Controllers;

use App\Models\DetalleProforma;
use App\Models\Proforma;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $proformas = Proforma::with('cliente', 'detallesProforma.producto')->get();

        return  $proformas;
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
            $proforma = Proforma::create($request->cabecera);
            foreach ($request->detalle as $detalle) {
                DetalleProforma::create(
                    [
                        'proforma_id' => $proforma->id,
                        'producto_id' => $detalle["producto_id"],
                        'cantidad' => $detalle["cantidad"],
                        'subtotal' =>  $detalle["subtotal"],
                        'precio_tipo' =>   $detalle["precio_tipo"]
                    ]
                );
            }
            DB::commit();
            return  ["estado" =>  200,  "proforma" => $proforma, "Message" => "Proforma Guardada"];
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["estado" => 400, "Message" => "Ocurrió un error en el servidor.", "proforma" =>  []], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function show(Proforma $proforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function edit(Proforma $proforma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proforma $proforma)
    {
        //
    }
}
