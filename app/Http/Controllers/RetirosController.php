<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Retiros;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetirosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $periodoActivo = Periodo::where('estado', 'Abierto')->first();
            $retiros = Retiros::where('periodo_id',  $periodoActivo->id)->get();
            DB::commit();
            return response()->json(["codigo" => 200, "Message" => "",  "data" => $retiros],  200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "", "data" => []], 200);
        }
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
            Retiros::create($request->all());
            $retiros = Retiros::where('periodo_id',  $request->periodo_id)->get();
            DB::commit();
            return response()->json(["codigo" => 200, "Message"   => "Retiro creado correctamente.", "data" => $retiros],  200);
        } catch (Exception $e) {


            DB::rollBack();
            return response()->json(["codigo" => 400,   "Message" => "Error al guardar retiro . " . $e->getMessage(), "data" => []], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retiros  $retiros
     * @return \Illuminate\Http\Response
     */
    public function show(Retiros $retiros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retiros  $retiros
     * @return \Illuminate\Http\Response
     */
    public function edit(Retiros $retiros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retiros  $retiros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retiros $retiros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retiros  $retiros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retiros $retiros)
    {
    }

    public function eliminarRetiro($idRetiro)
    {
        try {
            DB::beginTransaction();
            $retiro = Retiros::find($idRetiro);
            if ($retiro) {
                $retiro->delete();
            }

            $periodoActivo = Periodo::where('estado', 'Abierto')->first();
            $retiros = Retiros::where('periodo_id',  $periodoActivo->id)->get();

            DB::commit();
            return response()->json(["codigo" => 200, "Message" => "Retiro eliminado",  "data" => $retiros],  200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar el retiro", "data" => []], 200);
        }
    }
}
