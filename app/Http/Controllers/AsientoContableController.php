<?php

namespace App\Http\Controllers;

use App\Models\AsientoContable;
use App\Models\Facturas;
use App\Models\Gasto;
use App\Models\Retiros;
use App\Models\Creditos;
use App\Services\AsientoContableService;
use Illuminate\Http\Request;

class AsientoContableController extends Controller
{
    protected $service;

    public function __construct(AsientoContableService $service)
    {
        $this->service = $service;
    }

    /**
     * GET /api/asientos-contables
     * Listado con filtros: fecha_desde, fecha_hasta, tipo, estado.
     */
    public function index(Request $request)
    {
        $query = AsientoContable::with('detallesConCuenta')
            ->orderBy('fecha', 'desc')
            ->orderBy('numero', 'desc');

        if ($request->filled('fecha_desde')) {
            $query->where('fecha', '>=', $request->fecha_desde);
        }
        if ($request->filled('fecha_hasta')) {
            $query->where('fecha', '<=', $request->fecha_hasta);
        }
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $limite = $request->get('limite', 50);
        $asientos = $query->paginate($limite);

        return response()->json($asientos);
    }

    /**
     * POST /api/asientos-contables
     * Crear asiento manual.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:500',
            'lineas' => 'required|array|min:2',
            'lineas.*.cuenta_contable_id' => 'required|exists:cuenta_contables,id',
            'lineas.*.descripcion' => 'nullable|string|max:300',
            'lineas.*.debe' => 'required|numeric|min:0',
            'lineas.*.haber' => 'required|numeric|min:0',
        ]);

        // Validar que debe == haber
        $totalDebe = collect($request->lineas)->sum('debe');
        $totalHaber = collect($request->lineas)->sum('haber');

        if (round($totalDebe, 2) !== round($totalHaber, 2)) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'El asiento no está cuadrado. Debe ($' . number_format($totalDebe, 2) . ') != Haber ($' . number_format($totalHaber, 2) . ')',
            ], 422);
        }

        // Validar que cada línea tenga debe O haber (no ambos)
        foreach ($request->lineas as $i => $linea) {
            if ($linea['debe'] > 0 && $linea['haber'] > 0) {
                return response()->json([
                    'codigo' => 422,
                    'mensaje' => "Línea " . ($i + 1) . ": una línea no puede tener debe y haber al mismo tiempo",
                ], 422);
            }
            if ($linea['debe'] == 0 && $linea['haber'] == 0) {
                return response()->json([
                    'codigo' => 422,
                    'mensaje' => "Línea " . ($i + 1) . ": debe o haber debe ser mayor a 0",
                ], 422);
            }
        }

        $asiento = $this->service->crearAsiento([
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'tipo' => 'manual',
            'estado' => 'borrador',
            'usuario_id' => $request->usuario_id ?? null,
        ], $request->lineas);

        return response()->json([
            'codigo' => 201,
            'mensaje' => 'Asiento contable creado correctamente',
            'data' => $asiento,
        ], 201);
    }

    /**
     * GET /api/asientos-contables/{id}
     */
    public function show($id)
    {
        $asiento = AsientoContable::with('detallesConCuenta')->find($id);

        if (!$asiento) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Asiento no encontrado'], 404);
        }

        return response()->json(['data' => $asiento]);
    }

    /**
     * PUT /api/asientos-contables/{id}
     * Solo asientos en estado borrador.
     */
    public function update(Request $request, $id)
    {
        $asiento = AsientoContable::find($id);

        if (!$asiento) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Asiento no encontrado'], 404);
        }

        if ($asiento->estado !== 'borrador') {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'Solo se pueden editar asientos en estado borrador',
            ], 422);
        }

        $request->validate([
            'fecha' => 'sometimes|date',
            'descripcion' => 'sometimes|string|max:500',
            'lineas' => 'sometimes|array|min:2',
            'lineas.*.cuenta_contable_id' => 'required_with:lineas|exists:cuenta_contables,id',
            'lineas.*.descripcion' => 'nullable|string|max:300',
            'lineas.*.debe' => 'required_with:lineas|numeric|min:0',
            'lineas.*.haber' => 'required_with:lineas|numeric|min:0',
        ]);

        if ($request->has('fecha')) {
            $asiento->fecha = $request->fecha;
        }
        if ($request->has('descripcion')) {
            $asiento->descripcion = $request->descripcion;
        }

        // Si se envían líneas, reemplazar todas
        if ($request->has('lineas')) {
            $totalDebe = collect($request->lineas)->sum('debe');
            $totalHaber = collect($request->lineas)->sum('haber');

            if (round($totalDebe, 2) !== round($totalHaber, 2)) {
                return response()->json([
                    'codigo' => 422,
                    'mensaje' => 'El asiento no está cuadrado. Debe != Haber',
                ], 422);
            }

            // Eliminar detalles anteriores y crear nuevos
            $asiento->detalles()->delete();

            $now = now();
            $detalles = [];
            foreach ($request->lineas as $linea) {
                $detalles[] = [
                    'asiento_contable_id' => $asiento->id,
                    'cuenta_contable_id' => $linea['cuenta_contable_id'],
                    'descripcion' => $linea['descripcion'] ?? null,
                    'debe' => $linea['debe'] ?? 0,
                    'haber' => $linea['haber'] ?? 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            \App\Models\DetalleAsiento::insert($detalles);

            $asiento->total_debe = $totalDebe;
            $asiento->total_haber = $totalHaber;
        }

        $asiento->save();

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Asiento actualizado correctamente',
            'data' => $asiento->load('detallesConCuenta'),
        ]);
    }

    /**
     * POST /api/asientos-contables/{id}/contabilizar
     */
    public function contabilizar($id)
    {
        $asiento = AsientoContable::find($id);

        if (!$asiento) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Asiento no encontrado'], 404);
        }

        if ($asiento->estado !== 'borrador') {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'Solo se pueden contabilizar asientos en estado borrador',
            ], 422);
        }

        if (round($asiento->total_debe, 2) !== round($asiento->total_haber, 2)) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'No se puede contabilizar: el asiento no está cuadrado',
            ], 422);
        }

        $asiento->update(['estado' => 'contabilizado']);

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Asiento contabilizado correctamente',
            'data' => $asiento,
        ]);
    }

    /**
     * POST /api/asientos-contables/{id}/anular
     */
    public function anular(Request $request, $id)
    {
        $asiento = AsientoContable::find($id);

        if (!$asiento) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Asiento no encontrado'], 404);
        }

        if ($asiento->estado === 'anulado') {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'El asiento ya está anulado',
            ], 422);
        }

        $asiento->update(['estado' => 'anulado']);

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Asiento anulado correctamente',
            'data' => $asiento,
        ]);
    }

    /**
     * POST /api/asientos-contables/generar/desde-factura/{id}
     */
    public function generarDesdeFactura($id)
    {
        $factura = Facturas::find($id);

        if (!$factura) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Factura no encontrada'], 404);
        }

        // Verificar si ya existe un asiento para esta factura
        $existente = AsientoContable::where('referencia_tipo', 'factura')
            ->where('referencia_id', $id)
            ->where('estado', '!=', 'anulado')
            ->first();

        if ($existente) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'Ya existe un asiento contable para esta factura (Asiento #' . $existente->numero . ')',
            ], 422);
        }

        if ($factura->es_credito) {
            $asiento = $this->service->desdeFacturaCredito($factura);
        } else {
            $asiento = $this->service->desdeFactura($factura);
        }

        return response()->json([
            'codigo' => 201,
            'mensaje' => 'Asiento generado desde factura correctamente',
            'data' => $asiento,
        ], 201);
    }

    /**
     * POST /api/asientos-contables/generar/desde-gasto/{id}
     */
    public function generarDesdeGasto($id)
    {
        $gasto = Gasto::find($id);

        if (!$gasto) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Gasto no encontrado'], 404);
        }

        $existente = AsientoContable::where('referencia_tipo', 'gasto')
            ->where('referencia_id', $id)
            ->where('estado', '!=', 'anulado')
            ->first();

        if ($existente) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'Ya existe un asiento contable para este gasto (Asiento #' . $existente->numero . ')',
            ], 422);
        }

        $asiento = $this->service->desdeGasto($gasto);

        return response()->json([
            'codigo' => 201,
            'mensaje' => 'Asiento generado desde gasto correctamente',
            'data' => $asiento,
        ], 201);
    }

    /**
     * POST /api/asientos-contables/generar/desde-retiro/{id}
     */
    public function generarDesdeRetiro($id)
    {
        $retiro = Retiros::find($id);

        if (!$retiro) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Retiro no encontrado'], 404);
        }

        $existente = AsientoContable::where('referencia_tipo', 'retiro')
            ->where('referencia_id', $id)
            ->where('estado', '!=', 'anulado')
            ->first();

        if ($existente) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'Ya existe un asiento contable para este retiro (Asiento #' . $existente->numero . ')',
            ], 422);
        }

        $asiento = $this->service->desdeRetiro($retiro);

        return response()->json([
            'codigo' => 201,
            'mensaje' => 'Asiento generado desde retiro correctamente',
            'data' => $asiento,
        ], 201);
    }
}
