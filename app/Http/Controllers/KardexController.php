<?php

namespace App\Http\Controllers;

use App\Models\KardexMovimiento;
use App\Services\KardexService;
use App\Exports\ReporteExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Exception;

class KardexController extends Controller
{
    /**
     * GET /api/kardex
     * Listar movimientos con filtros avanzados y paginación.
     */
    public function index(Request $request)
    {
        $query = KardexMovimiento::with('bodega:id,nombre');

        // Filtro por rango de fechas (default: mes actual)
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha', [
                Carbon::parse($request->fecha_inicio)->startOfDay(),
                Carbon::parse($request->fecha_fin)->endOfDay(),
            ]);
        } else {
            $query->whereBetween('fecha', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfDay(),
            ]);
        }

        // Filtro por tipo: entradas, salidas, todos
        if ($request->filled('tipo') && $request->tipo !== 'todos') {
            if ($request->tipo === 'entradas') {
                $query->where('entrada', '>', 0);
            } elseif ($request->tipo === 'salidas') {
                $query->where('salida', '>', 0);
            }
        }

        // Filtro por bodega
        if ($request->filled('bodega_id')) {
            $query->where('bodega_id', $request->bodega_id);
        }

        // Filtro por producto específico
        if ($request->filled('producto_id')) {
            $query->where('producto_id', $request->producto_id);
        }

        // Búsqueda general en múltiples campos
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('codigo', 'LIKE', "%{$search}%")
                  ->orWhere('producto', 'LIKE', "%{$search}%")
                  ->orWhere('detalle', 'LIKE', "%{$search}%")
                  ->orWhere('referencia', 'LIKE', "%{$search}%")
                  ->orWhere('usuario', 'LIKE', "%{$search}%");
            });
        }

        $perPage = $request->input('per_page', 25);

        $movimientos = $query->orderBy('fecha', 'desc')
                             ->orderBy('id', 'desc')
                             ->paginate($perPage);

        return response()->json($movimientos);
    }

    /**
     * GET /api/kardex/{id}
     * Detalle de un movimiento específico.
     */
    public function show($id)
    {
        $movimiento = KardexMovimiento::with('bodega:id,nombre', 'productoRelacion:id,nombre,codigo_barra,stock')
            ->findOrFail($id);

        return response()->json($movimiento);
    }

    /**
     * GET /api/kardex/export-excel
     * Exportar movimientos filtrados a Excel.
     */
    public function exportExcel(Request $request)
    {
        $query = KardexMovimiento::with('bodega:id,nombre');

        // Aplicar los mismos filtros que el listado
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha', [
                Carbon::parse($request->fecha_inicio)->startOfDay(),
                Carbon::parse($request->fecha_fin)->endOfDay(),
            ]);
        } else {
            $query->whereBetween('fecha', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfDay(),
            ]);
        }

        if ($request->filled('tipo') && $request->tipo !== 'todos') {
            if ($request->tipo === 'entradas') {
                $query->where('entrada', '>', 0);
            } elseif ($request->tipo === 'salidas') {
                $query->where('salida', '>', 0);
            }
        }

        if ($request->filled('bodega_id')) {
            $query->where('bodega_id', $request->bodega_id);
        }

        if ($request->filled('producto_id')) {
            $query->where('producto_id', $request->producto_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('codigo', 'LIKE', "%{$search}%")
                  ->orWhere('producto', 'LIKE', "%{$search}%")
                  ->orWhere('detalle', 'LIKE', "%{$search}%")
                  ->orWhere('referencia', 'LIKE', "%{$search}%")
                  ->orWhere('usuario', 'LIKE', "%{$search}%");
            });
        }

        $movimientos = $query->orderBy('fecha', 'desc')
                             ->orderBy('id', 'desc')
                             ->get();

        $headers = ['ID', 'Fecha', 'Codigo', 'Producto', 'Bodega', 'Detalle', 'Tipo', 'Entrada', 'Salida', 'Saldo', 'Costo Unit.', 'Costo Total', 'Usuario', 'Referencia'];

        $totalEntradas = 0;
        $totalSalidas = 0;

        $rows = $movimientos->map(function ($m) use (&$totalEntradas, &$totalSalidas) {
            $totalEntradas += $m->entrada;
            $totalSalidas += $m->salida;
            return [
                $m->id,
                $m->fecha,
                $m->codigo,
                $m->producto,
                $m->bodega->nombre ?? '',
                $m->detalle,
                $m->tipo,
                $m->entrada,
                $m->salida,
                $m->saldo,
                $m->costo_unitario,
                $m->costo_total,
                $m->usuario,
                $m->referencia,
            ];
        })->toArray();

        // Fila de totales
        $rows[] = ['', '', '', '', '', '', 'TOTALES', $totalEntradas, $totalSalidas, '', '', '', '', ''];

        $fechaInicio = $request->input('fecha_inicio', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', Carbon::now()->format('Y-m-d'));

        $export = new ReporteExport($headers, $rows, "Kardex {$fechaInicio} a {$fechaFin}");

        return Excel::download($export, "kardex_{$fechaInicio}_{$fechaFin}.xlsx");
    }

    /**
     * POST /api/kardex/ajuste
     * Registrar un ajuste manual de inventario.
     */
    public function ajusteManual(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:0.01',
            'tipo_ajuste' => 'required|in:positivo,negativo',
            'detalle' => 'nullable|string|max:255',
            'usuario' => 'nullable|string|max:100',
            'bodega_id' => 'nullable|integer|exists:bodegas,id',
        ]);

        try {
            $movimiento = KardexService::registrarAjuste(
                $request->producto_id,
                $request->cantidad,
                $request->tipo_ajuste,
                $request->detalle,
                $request->usuario,
                $request->bodega_id
            );

            return response()->json([
                'codigo' => 200,
                'mensaje' => 'Ajuste registrado correctamente.',
                'movimiento' => $movimiento,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'codigo' => 400,
                'mensaje' => 'Error al registrar el ajuste.',
            ], 400);
        }
    }

    /**
     * POST /api/kardex/entrada
     * Registrar una entrada manual (compra, fabricación, devolución).
     */
    public function entradaManual(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:0.01',
            'tipo' => 'required|in:Compras,Fabricacion,Devolucion',
            'detalle' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:100',
            'usuario' => 'nullable|string|max:100',
            'bodega_id' => 'nullable|integer|exists:bodegas,id',
        ]);

        try {
            $movimiento = KardexService::registrarEntrada(
                $request->producto_id,
                $request->cantidad,
                $request->tipo,
                $request->detalle,
                $request->referencia,
                $request->usuario,
                $request->bodega_id
            );

            return response()->json([
                'codigo' => 200,
                'mensaje' => 'Entrada registrada correctamente.',
                'movimiento' => $movimiento,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'codigo' => 400,
                'mensaje' => 'Error al registrar la entrada.',
            ], 400);
        }
    }

    /**
     * POST /api/kardex/transferencia
     * Registrar una transferencia entre bodegas.
     */
    public function transferencia(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:0.01',
            'bodega_origen_id' => 'required|integer|exists:bodegas,id',
            'bodega_destino_id' => 'required|integer|exists:bodegas,id|different:bodega_origen_id',
            'detalle' => 'nullable|string|max:255',
            'usuario' => 'nullable|string|max:100',
        ]);

        try {
            $movimientos = KardexService::registrarTransferencia(
                $request->producto_id,
                $request->cantidad,
                $request->bodega_origen_id,
                $request->bodega_destino_id,
                $request->detalle,
                $request->usuario
            );

            return response()->json([
                'codigo' => 200,
                'mensaje' => 'Transferencia registrada correctamente.',
                'movimientos' => $movimientos,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'codigo' => 400,
                'mensaje' => 'Error al registrar la transferencia.',
            ], 400);
        }
    }
}
