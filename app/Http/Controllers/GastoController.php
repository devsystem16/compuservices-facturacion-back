<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\Facturas;
use App\Models\Gasto;
use App\Models\Ordenes;
use App\Models\Periodo;
use App\Models\Retiros;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    public function index()
    {
        try {
            $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
        } catch (Exception $e) {
            return response()->json(["codigo" => 404, "Message" => "No hay período activo.", "data" => []], 200);
        }

        $gastos = Gasto::with(['categoriaGasto:id,nombre,color', 'usuario:id,nombres'])
            ->where('periodo_id', $periodoActivo->id)
            ->orderBy('fecha', 'desc')
            ->get();

        $totalGastos = $gastos->sum('monto');

        return response()->json([
            "codigo" => 200,
            "Message" => "",
            "data" => [
                "gastos" => $gastos,
                "total_gastos" => $totalGastos,
                "periodo" => $periodoActivo,
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
        } catch (Exception $e) {
            return response()->json(["codigo" => 404, "Message" => "No hay período activo para registrar el gasto.", "data" => []], 200);
        }

        try {
            DB::beginTransaction();
            $datos = $request->all();
            $datos['periodo_id'] = $periodoActivo->id;
            $gasto = Gasto::create($datos);
            $gasto->load(['categoriaGasto:id,nombre,color', 'usuario:id,nombres']);
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Gasto registrado correctamente.", "data" => $gasto], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al registrar el gasto.", "data" => []], 200);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $gasto = Gasto::findOrFail($id);
            $gasto->update($request->all());
            $gasto->load(['categoriaGasto:id,nombre,color', 'usuario:id,nombres']);
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Gasto actualizado correctamente.", "data" => $gasto], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al actualizar el gasto.", "data" => []], 200);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Gasto::findOrFail($id)->delete();
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Gasto eliminado correctamente.", "data" => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar el gasto.", "data" => []], 200);
        }
    }

    public function porCategoria(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;

            $gastos = Gasto::select(
                    'categoria_gastos.id',
                    'categoria_gastos.nombre',
                    'categoria_gastos.color',
                    DB::raw('COUNT(gastos.id) as total_gastos'),
                    DB::raw('COALESCE(SUM(gastos.monto), 0) as total_monto')
                )
                ->join('categoria_gastos', 'categoria_gastos.id', '=', 'gastos.categoria_gasto_id')
                ->whereNull('gastos.deleted_at')
                ->whereBetween('gastos.fecha', [$fechaDesde, $fechaHasta])
                ->groupBy('categoria_gastos.id', 'categoria_gastos.nombre', 'categoria_gastos.color')
                ->orderBy('total_monto', 'desc')
                ->get();

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "categorias" => $gastos,
                    "total" => $gastos->sum('total_monto'),
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar reporte por categoría.", "data" => []], 200);
        }
    }

    public function balanceCaja(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;
            $periodoId = $request->periodo_id;

            // Si se pasa periodo_id, obtener el rango de fechas del periodo
            if ($periodoId) {
                $periodo = Periodo::findOrFail($periodoId);
                $fechaDesde = $periodo->fecha_apertura;
                $fechaHasta = $periodo->fecha_cierre ?? now()->format('Y-m-d H:i:s');
            }

            // INGRESOS: Facturas cerradas (no crédito)
            $ingresoFacturas = Facturas::where('estado', 'cerrada')
                ->where('es_credito', 0)
                ->whereNull('deleted_at')
                ->whereBetween(DB::raw('DATE(fecha)'), [substr($fechaDesde, 0, 10), substr($fechaHasta, 0, 10)])
                ->sum('total');

            // INGRESOS: Abonos de órdenes de trabajo
            $ingresoOrdenes = DB::table('abono_ordenes')
                ->join('ordenes', 'ordenes.id', '=', 'abono_ordenes.orden_id')
                ->where('ordenes.estado', '1')
                ->whereNull('ordenes.deleted_at')
                ->whereBetween('abono_ordenes.fecha', [substr($fechaDesde, 0, 10), substr($fechaHasta, 0, 10)])
                ->sum('abono_ordenes.abono');

            // INGRESOS: Abonos de créditos
            $ingresoCreditos = DB::table('detalle_creditos')
                ->join('creditos', 'creditos.id', '=', 'detalle_creditos.credito_id')
                ->whereNull('creditos.deleted_at')
                ->whereNull('detalle_creditos.deleted_at')
                ->whereBetween('detalle_creditos.fecha', [substr($fechaDesde, 0, 10), substr($fechaHasta, 0, 10)])
                ->sum('detalle_creditos.abono');

            // EGRESOS: Gastos
            $egresoGastos = Gasto::whereNull('deleted_at')
                ->whereBetween('fecha', [substr($fechaDesde, 0, 10), substr($fechaHasta, 0, 10)])
                ->sum('monto');

            // EGRESOS: Retiros
            $queryRetiros = Retiros::whereNull('deleted_at');
            if ($periodoId) {
                $queryRetiros->where('periodo_id', $periodoId);
            } else {
                $queryRetiros->whereBetween(DB::raw('DATE(created_at)'), [substr($fechaDesde, 0, 10), substr($fechaHasta, 0, 10)]);
            }
            $egresoRetiros = $queryRetiros->sum('valorRetiro');

            $totalIngresos = $ingresoFacturas + $ingresoOrdenes + $ingresoCreditos;
            $totalEgresos = $egresoGastos + $egresoRetiros;
            $balance = $totalIngresos - $totalEgresos;

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "ingresos" => [
                        "facturas" => round($ingresoFacturas, 2),
                        "ordenes" => round($ingresoOrdenes, 2),
                        "creditos" => round($ingresoCreditos, 2),
                        "total" => round($totalIngresos, 2),
                    ],
                    "egresos" => [
                        "gastos" => round($egresoGastos, 2),
                        "retiros" => round($egresoRetiros, 2),
                        "total" => round($totalEgresos, 2),
                    ],
                    "balance" => round($balance, 2),
                    "fecha_desde" => $fechaDesde,
                    "fecha_hasta" => $fechaHasta,
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al calcular balance de caja.", "data" => []], 200);
        }
    }
}
