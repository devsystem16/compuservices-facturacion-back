<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Retiros;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodoController extends Controller
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


    public function cerrarPeriodo($id)
    {
        $periodo = Periodo::findOrFail($id);
        // Verificar si el periodo ya está cerrado
        if ($periodo->estado === 'Cerrado') {
            return response()->json(['message' => 'El periodo ya está cerrado.'], 200);
        }
        // Actualizar el estado del periodo a "Cerrado"
        $periodo->estado = 'Cerrado';
        $periodo->save();
        return response()->json(['message' => 'El periodo ha sido cerrado exitosamente.'], 200);
    }


    public function obtenerRetiros()
    {
        // $periodoActivo = Periodo::where('estado', 'Abierto')->first();
        // $sumaValorRetiro = Retiros::where('periodo_id',   $periodoActivo->id)->sum('valorRetiro');
        // return  ["totalRetiros" => $sumaValorRetiro];
        $periodoActivo = Periodo::where('estado', 'Abierto')->first();
        if ($periodoActivo) {
            $sumaValorRetiro = Retiros::where('periodo_id', $periodoActivo->id)->sum('valorRetiro');
            return ["totalRetiros" => $sumaValorRetiro];
        } else {
            return ["totalRetiros" => 0];
        }
    }
    public function existePeriodoAbierto()
    {

        $periodoAbierto = Periodo::where('estado', 'Abierto')->exists();
        if (!$periodoAbierto) {
            return response()->json(
                [
                    'message' => 'No se encontró ningún período abierto.',
                    "isOpen" =>  $periodoAbierto,
                    "estado" => "iniciar-periodo",
                    "periodo" =>  []
                ],
                404
            );
        }

        // Se encontro un Periodo Activo, Buscar cual es.!!
        $periodoActivo = Periodo::where('estado', 'Abierto')->first();

        $fechaActual = Carbon::now()->startOfDay();
        $fechaApertura = Carbon::parse($periodoActivo->fecha_apertura)->startOfDay();

        if ($fechaApertura->lessThan($fechaActual)) {
            return response()->json(
                [
                    'message' => 'Existe un período abierto, pero la fecha de apertura es menor a la fecha actual <br />' .  $fechaApertura,
                    "isOpen" =>  $periodoAbierto,
                    "periodo" => $periodoActivo,
                    "estado" =>  "periodo-anterior-activo"
                ],
                200
            );
        }


        return response()->json(
            [
                'message' => 'Existe un período abierto.',
                "isOpen" =>   $periodoAbierto,
                "periodo" =>  $periodoActivo,
                "estado" =>   "periodo-activo"
            ],
            200
        );
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
        // Verificar si existe un período abierto
        $periodoAbierto = Periodo::where('estado', 'Abierto')->first();
        if ($periodoAbierto) {
            return response()->json(['message' => 'Ya existe un período abierto.', 'data' => $periodoAbierto], 409);
        }
        // Validar los datos del formulario, si es necesario
        $validatedData = $request->validate([
            'fecha_apertura' => 'required|date',
            'usuario_id_apertura' => 'required|integer',
            'estado' => 'required|string',
            'fondo_asignado' => 'required',
            'observaciones' => 'string',
        ]);

        // Crear el nuevo período
        $periodo = Periodo::create($validatedData);

        // Devolver la respuesta JSON con el código HTTP 201 (Created)
        return response()->json(['message' => 'Período creado exitosamente.', 'data' => $periodo], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodo $periodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodo $periodo)
    {
        //
    }
}
