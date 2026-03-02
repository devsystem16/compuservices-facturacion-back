<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\Detalles;
use App\Models\Facturas;
use App\Models\Ordenes;
use App\Models\Periodo;
use App\Models\Productos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function resumen()
    {
        return Cache::remember('dashboard_resumen', 60, function () {
            try {
                $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
                $idPeriodo = $periodoActivo->id;
            } catch (Exception $e) {
                return response()->json(["codigo" => 404, "Message" => "No hay período activo", "data" => []], 200);
            }

            $ventas = Facturas::where('periodo_id', $idPeriodo)
                ->where('estado', 'cerrada')
                ->select(
                    DB::raw('COUNT(*) as total_facturas'),
                    DB::raw('COALESCE(SUM(total), 0) as total_ventas')
                )
                ->first();

            $creditosPendientes = Creditos::where('saldo', '>', 0)
                ->select(
                    DB::raw('COUNT(*) as total_creditos'),
                    DB::raw('COALESCE(SUM(saldo), 0) as total_saldo')
                )
                ->first();

            $productosStockBajo = Productos::where('stock', '<=', 5)->count();

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "periodo" => $periodoActivo,
                    "ventas" => [
                        "total_facturas" => $ventas->total_facturas,
                        "total_ventas" => $ventas->total_ventas,
                    ],
                    "creditos_pendientes" => [
                        "total_creditos" => $creditosPendientes->total_creditos,
                        "total_saldo" => $creditosPendientes->total_saldo,
                    ],
                    "productos_stock_bajo" => $productosStockBajo,
                ]
            ], 200);
        });
    }

    public function ventasPeriodo(Request $request)
    {
        $tipo = $request->get('tipo', 'diario');
        $fechaDesde = $request->get('fecha_desde');
        $fechaHasta = $request->get('fecha_hasta');

        switch ($tipo) {
            case 'semanal':
                $groupBy = DB::raw('YEARWEEK(facturas.fecha)');
                $selectDate = DB::raw('YEARWEEK(facturas.fecha) as periodo, MIN(facturas.fecha) as fecha_inicio, MAX(facturas.fecha) as fecha_fin');
                break;
            case 'mensual':
                $groupBy = DB::raw('DATE_FORMAT(facturas.fecha, "%Y-%m")');
                $selectDate = DB::raw('DATE_FORMAT(facturas.fecha, "%Y-%m") as periodo');
                break;
            default:
                $groupBy = DB::raw('DATE(facturas.fecha)');
                $selectDate = DB::raw('DATE(facturas.fecha) as periodo');
                break;
        }

        $query = Facturas::select(
                $selectDate,
                DB::raw('COUNT(*) as total_facturas'),
                DB::raw('COALESCE(SUM(total), 0) as total_ventas')
            )
            ->where('estado', 'cerrada')
            ->whereNull('facturas.deleted_at');

        if ($fechaDesde && $fechaHasta) {
            $query->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta]);
        }

        $ventas = $query->groupBy($groupBy)
            ->orderBy('periodo', 'asc')
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $ventas], 200);
    }

    public function topProductos(Request $request)
    {
        $fechaDesde = $request->get('fecha_desde');
        $fechaHasta = $request->get('fecha_hasta');

        $query = Detalles::select(
                'detalles.producto_id',
                'productos.nombre',
                'productos.codigo_barra',
                DB::raw('SUM(detalles.cantidad) as total_cantidad'),
                DB::raw('SUM(detalles.subtotal) as total_ventas')
            )
            ->join('productos', 'productos.id', '=', 'detalles.producto_id')
            ->join('facturas', 'facturas.id', '=', 'detalles.factura_id')
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at')
            ->whereNull('detalles.deleted_at');

        if ($fechaDesde && $fechaHasta) {
            $query->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta]);
        }

        $productos = $query->groupBy('detalles.producto_id', 'productos.nombre', 'productos.codigo_barra')
            ->orderBy('total_cantidad', 'desc')
            ->limit(10)
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $productos], 200);
    }

    public function topClientes(Request $request)
    {
        $fechaDesde = $request->get('fecha_desde');
        $fechaHasta = $request->get('fecha_hasta');

        $query = Facturas::select(
                'facturas.cliente_id',
                'clientes.nombres',
                'clientes.cedula',
                DB::raw('COUNT(*) as total_facturas'),
                DB::raw('COALESCE(SUM(facturas.total), 0) as total_compras')
            )
            ->join('clientes', 'clientes.id', '=', 'facturas.cliente_id')
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at')
            ->whereNull('clientes.deleted_at');

        if ($fechaDesde && $fechaHasta) {
            $query->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta]);
        }

        $clientes = $query->groupBy('facturas.cliente_id', 'clientes.nombres', 'clientes.cedula')
            ->orderBy('total_compras', 'desc')
            ->limit(10)
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $clientes], 200);
    }

    public function stockBajo(Request $request)
    {
        $umbral = $request->get('umbral', 5);

        return Cache::remember('dashboard_stock_bajo_' . $umbral, 120, function () use ($umbral) {
            $productos = Productos::select('id', 'nombre', 'descripcion', 'codigo_barra', 'stock', 'precio_compra', 'precio_publico')
                ->where('stock', '<=', $umbral)
                ->orderBy('stock', 'asc')
                ->get();

            return response()->json(["codigo" => 200, "Message" => "", "data" => $productos], 200);
        });
    }

    public function creditosPendientes()
    {
        return Cache::remember('dashboard_creditos_pendientes', 120, function () {
            $creditos = Creditos::with('cliente:id,nombres,cedula')
                ->where('saldo', '>', 0)
                ->select('id', 'cliente_id', 'fecha', 'detalle', 'saldo', 'total')
                ->orderBy('fecha', 'asc')
                ->get();

            $totalPendiente = $creditos->sum('saldo');

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "creditos" => $creditos,
                    "total_pendiente" => $totalPendiente,
                    "total_creditos" => $creditos->count(),
                ]
            ], 200);
        });
    }
}
