<?php

namespace App\Http\Controllers;

use App\Models\AsientoContable;
use App\Models\CuentaContable;
use App\Models\DetalleAsiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteContableController extends Controller
{
    /**
     * POST /api/contabilidad/libro-diario
     * Libro diario: todos los asientos contabilizados en un rango de fechas.
     */
    public function libroDiario(Request $request)
    {
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
        ]);

        $asientos = AsientoContable::with('detallesConCuenta')
            ->where('estado', 'contabilizado')
            ->whereBetween('fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->orderBy('fecha')
            ->orderBy('numero')
            ->get();

        $totales = [
            'total_debe' => $asientos->sum('total_debe'),
            'total_haber' => $asientos->sum('total_haber'),
        ];

        return response()->json([
            'data' => $asientos,
            'totales' => $totales,
            'periodo' => [
                'desde' => $request->fecha_desde,
                'hasta' => $request->fecha_hasta,
            ],
        ]);
    }

    /**
     * POST /api/contabilidad/libro-mayor
     * Libro mayor: movimientos por cuenta en un rango de fechas.
     */
    public function libroMayor(Request $request)
    {
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'cuenta_contable_id' => 'nullable|exists:cuenta_contables,id',
        ]);

        $query = DetalleAsiento::select(
                'detalle_asientos.cuenta_contable_id',
                'cuenta_contables.codigo',
                'cuenta_contables.nombre',
                'cuenta_contables.naturaleza',
                DB::raw('SUM(detalle_asientos.debe) as total_debe'),
                DB::raw('SUM(detalle_asientos.haber) as total_haber')
            )
            ->join('asientos_contables', 'asientos_contables.id', '=', 'detalle_asientos.asiento_contable_id')
            ->join('cuenta_contables', 'cuenta_contables.id', '=', 'detalle_asientos.cuenta_contable_id')
            ->where('asientos_contables.estado', 'contabilizado')
            ->whereNull('asientos_contables.deleted_at')
            ->whereBetween('asientos_contables.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->groupBy('detalle_asientos.cuenta_contable_id', 'cuenta_contables.codigo', 'cuenta_contables.nombre', 'cuenta_contables.naturaleza')
            ->orderBy('cuenta_contables.codigo');

        if ($request->filled('cuenta_contable_id')) {
            $query->where('detalle_asientos.cuenta_contable_id', $request->cuenta_contable_id);
        }

        $cuentas = $query->get();

        // Calcular saldo por cuenta
        $cuentas->transform(function ($cuenta) {
            $saldo = $cuenta->naturaleza === 'deudora'
                ? $cuenta->total_debe - $cuenta->total_haber
                : $cuenta->total_haber - $cuenta->total_debe;
            $cuenta->saldo = round($saldo, 2);
            return $cuenta;
        });

        // Si se pide una cuenta específica, incluir detalle de movimientos
        if ($request->filled('cuenta_contable_id')) {
            $movimientos = DetalleAsiento::select(
                    'detalle_asientos.*',
                    'asientos_contables.numero',
                    'asientos_contables.fecha',
                    'asientos_contables.descripcion as asiento_descripcion'
                )
                ->join('asientos_contables', 'asientos_contables.id', '=', 'detalle_asientos.asiento_contable_id')
                ->where('asientos_contables.estado', 'contabilizado')
                ->whereNull('asientos_contables.deleted_at')
                ->where('detalle_asientos.cuenta_contable_id', $request->cuenta_contable_id)
                ->whereBetween('asientos_contables.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->orderBy('asientos_contables.fecha')
                ->orderBy('asientos_contables.numero')
                ->get();

            return response()->json([
                'cuenta' => $cuentas->first(),
                'movimientos' => $movimientos,
                'periodo' => ['desde' => $request->fecha_desde, 'hasta' => $request->fecha_hasta],
            ]);
        }

        return response()->json([
            'data' => $cuentas,
            'periodo' => ['desde' => $request->fecha_desde, 'hasta' => $request->fecha_hasta],
        ]);
    }

    /**
     * POST /api/contabilidad/balance-comprobacion
     * Balance de comprobación: saldos de todas las cuentas.
     */
    public function balanceComprobacion(Request $request)
    {
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
        ]);

        $cuentas = DetalleAsiento::select(
                'detalle_asientos.cuenta_contable_id',
                'cuenta_contables.codigo',
                'cuenta_contables.nombre',
                'cuenta_contables.tipo',
                'cuenta_contables.naturaleza',
                DB::raw('SUM(detalle_asientos.debe) as total_debe'),
                DB::raw('SUM(detalle_asientos.haber) as total_haber')
            )
            ->join('asientos_contables', 'asientos_contables.id', '=', 'detalle_asientos.asiento_contable_id')
            ->join('cuenta_contables', 'cuenta_contables.id', '=', 'detalle_asientos.cuenta_contable_id')
            ->where('asientos_contables.estado', 'contabilizado')
            ->whereNull('asientos_contables.deleted_at')
            ->whereBetween('asientos_contables.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->groupBy(
                'detalle_asientos.cuenta_contable_id',
                'cuenta_contables.codigo',
                'cuenta_contables.nombre',
                'cuenta_contables.tipo',
                'cuenta_contables.naturaleza'
            )
            ->orderBy('cuenta_contables.codigo')
            ->get();

        $cuentas->transform(function ($cuenta) {
            $saldo = $cuenta->naturaleza === 'deudora'
                ? $cuenta->total_debe - $cuenta->total_haber
                : $cuenta->total_haber - $cuenta->total_debe;
            $cuenta->saldo = round($saldo, 2);
            $cuenta->saldo_debe = $saldo > 0 && $cuenta->naturaleza === 'deudora' ? abs($saldo) : ($saldo < 0 && $cuenta->naturaleza === 'acreedora' ? abs($saldo) : 0);
            $cuenta->saldo_haber = $saldo > 0 && $cuenta->naturaleza === 'acreedora' ? abs($saldo) : ($saldo < 0 && $cuenta->naturaleza === 'deudora' ? abs($saldo) : 0);
            return $cuenta;
        });

        $totales = [
            'total_debe' => $cuentas->sum('total_debe'),
            'total_haber' => $cuentas->sum('total_haber'),
            'saldo_debe' => $cuentas->sum('saldo_debe'),
            'saldo_haber' => $cuentas->sum('saldo_haber'),
        ];

        return response()->json([
            'data' => $cuentas,
            'totales' => $totales,
            'periodo' => ['desde' => $request->fecha_desde, 'hasta' => $request->fecha_hasta],
        ]);
    }

    /**
     * POST /api/contabilidad/balance-general
     * Balance general: activos, pasivos, patrimonio.
     */
    public function balanceGeneral(Request $request)
    {
        $request->validate([
            'fecha_hasta' => 'required|date',
        ]);

        $cuentas = DetalleAsiento::select(
                'cuenta_contables.tipo',
                'cuenta_contables.codigo',
                'cuenta_contables.nombre',
                'cuenta_contables.naturaleza',
                DB::raw('SUM(detalle_asientos.debe) as total_debe'),
                DB::raw('SUM(detalle_asientos.haber) as total_haber')
            )
            ->join('asientos_contables', 'asientos_contables.id', '=', 'detalle_asientos.asiento_contable_id')
            ->join('cuenta_contables', 'cuenta_contables.id', '=', 'detalle_asientos.cuenta_contable_id')
            ->where('asientos_contables.estado', 'contabilizado')
            ->whereNull('asientos_contables.deleted_at')
            ->where('asientos_contables.fecha', '<=', $request->fecha_hasta)
            ->whereIn('cuenta_contables.tipo', ['activo', 'pasivo', 'patrimonio'])
            ->groupBy('cuenta_contables.tipo', 'cuenta_contables.codigo', 'cuenta_contables.nombre', 'cuenta_contables.naturaleza')
            ->orderBy('cuenta_contables.codigo')
            ->get();

        $cuentas->transform(function ($cuenta) {
            $cuenta->saldo = $cuenta->naturaleza === 'deudora'
                ? round($cuenta->total_debe - $cuenta->total_haber, 2)
                : round($cuenta->total_haber - $cuenta->total_debe, 2);
            return $cuenta;
        });

        $agrupado = $cuentas->groupBy('tipo');

        $totalActivos = ($agrupado->get('activo') ?? collect())->sum('saldo');
        $totalPasivos = ($agrupado->get('pasivo') ?? collect())->sum('saldo');
        $totalPatrimonio = ($agrupado->get('patrimonio') ?? collect())->sum('saldo');

        return response()->json([
            'activos' => $agrupado->get('activo', []),
            'pasivos' => $agrupado->get('pasivo', []),
            'patrimonio' => $agrupado->get('patrimonio', []),
            'totales' => [
                'activos' => round($totalActivos, 2),
                'pasivos' => round($totalPasivos, 2),
                'patrimonio' => round($totalPatrimonio, 2),
                'pasivos_patrimonio' => round($totalPasivos + $totalPatrimonio, 2),
            ],
            'fecha_corte' => $request->fecha_hasta,
        ]);
    }

    /**
     * POST /api/contabilidad/estado-resultados
     * Estado de resultados: ingresos - gastos.
     */
    public function estadoResultados(Request $request)
    {
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
        ]);

        $cuentas = DetalleAsiento::select(
                'cuenta_contables.tipo',
                'cuenta_contables.codigo',
                'cuenta_contables.nombre',
                'cuenta_contables.naturaleza',
                DB::raw('SUM(detalle_asientos.debe) as total_debe'),
                DB::raw('SUM(detalle_asientos.haber) as total_haber')
            )
            ->join('asientos_contables', 'asientos_contables.id', '=', 'detalle_asientos.asiento_contable_id')
            ->join('cuenta_contables', 'cuenta_contables.id', '=', 'detalle_asientos.cuenta_contable_id')
            ->where('asientos_contables.estado', 'contabilizado')
            ->whereNull('asientos_contables.deleted_at')
            ->whereBetween('asientos_contables.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->whereIn('cuenta_contables.tipo', ['ingreso', 'gasto'])
            ->groupBy('cuenta_contables.tipo', 'cuenta_contables.codigo', 'cuenta_contables.nombre', 'cuenta_contables.naturaleza')
            ->orderBy('cuenta_contables.codigo')
            ->get();

        $cuentas->transform(function ($cuenta) {
            $cuenta->saldo = $cuenta->naturaleza === 'acreedora'
                ? round($cuenta->total_haber - $cuenta->total_debe, 2)
                : round($cuenta->total_debe - $cuenta->total_haber, 2);
            return $cuenta;
        });

        $agrupado = $cuentas->groupBy('tipo');

        $totalIngresos = ($agrupado->get('ingreso') ?? collect())->sum('saldo');
        $totalGastos = ($agrupado->get('gasto') ?? collect())->sum('saldo');
        $utilidad = $totalIngresos - $totalGastos;

        return response()->json([
            'ingresos' => $agrupado->get('ingreso', []),
            'gastos' => $agrupado->get('gasto', []),
            'totales' => [
                'ingresos' => round($totalIngresos, 2),
                'gastos' => round($totalGastos, 2),
                'utilidad_neta' => round($utilidad, 2),
            ],
            'periodo' => ['desde' => $request->fecha_desde, 'hasta' => $request->fecha_hasta],
        ]);
    }
}
