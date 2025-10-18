<?php

namespace App\Http\Controllers;

use App\Models\DetalleProforma;
use App\Models\Proforma;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProformaController extends Controller
{

    public function eliminarProforma($idProforma)
    {
        try {
            DB::beginTransaction();
            $Proforma = Proforma::where('id', $idProforma)->first();
            $Proforma->delete();
            DB::commit();
            return  ["estado" =>  200,  "proforma" => $Proforma, "Message" => "Proforma Eliminada"];
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["estado" => 400, "Message" => "Ocurrió un error en el servidor.", "proforma" =>  []], 200);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $proformas = Proforma::with('cliente', 'detallesProforma.producto')
            ->whereDate('fecha_vencimiento', '>=', date('Y-m-d'))
            ->get();

        return $proformas;
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
    }

 public function obtenerProforma(Request $request)
{
    try {
        $id = $request->input('idProforma');

          // Carga relaciones: cliente y detalles con producto
        $proforma = Proforma::with([
            'cliente',
            'detallesProforma.producto'
        ])->findOrFail($id);


        return       $proforma ;

        
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'El campo idProforma es obligatorio.'
            ], 400);
        }

      

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $proforma->id,
                'fecha_emision' => $proforma->fecha_emision,
                'fecha_vencimiento' => $proforma->fecha_vencimiento,
                'estado' => $proforma->estado,
                'observacion' => $proforma->observacion,
                'subtotal' => $proforma->subtotal,
                'iva' => $proforma->iva,
                'total' => $proforma->total,
                'cliente' => [
                    'id' => $proforma->cliente->id ?? null,
                    'cedula' => $proforma->cliente->cedula ?? null,
                    'nombres' => $proforma->cliente->nombres ?? null,
                    'telefono' => $proforma->cliente->telefono ?? null,
                    'direccion' => $proforma->cliente->direccion ?? null,
                    'correo' => $proforma->cliente->correo ?? null,
                    'observacion' => $proforma->cliente->observacion ?? null,
                ],
                'detalles' => $proforma->detallesProforma->map(function ($detalle) {
                    return [
                        'id' => $detalle->id,
                        'producto_id' => $detalle->producto_id,
                        'nombre_producto' => $detalle->producto->nombre ?? '(No encontrado)',
                        'descripcion' => $detalle->producto->descripcion ?? null,
                        'cantidad' => $detalle->cantidad,
                        'precio_unitario' => $detalle->precio_tipo,
                        'subtotal' => $detalle->subtotal,
                        'total' => $detalle->cantidad * $detalle->precio_tipo,
                    ];
                }),
            ],
        ], 200);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Proforma no encontrada.'
        ], 404);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al obtener la proforma.',
            'error' => $e->getMessage(),
        ], 500);
    }
}



}
