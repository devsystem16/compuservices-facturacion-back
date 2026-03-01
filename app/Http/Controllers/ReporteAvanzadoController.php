<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use App\Models\DetalleCreditos;
use App\Models\Detalles;
use App\Models\Facturas;
use App\Models\Productos;
use App\Exports\ReporteExport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteAvanzadoController extends Controller
{
    public function utilidades(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;

            // Detalle por factura (sin agrupar por producto) para incluir forma de pago
            $utilidades = Detalles::select(
                    'facturas.id as factura_id',
                    'facturas.fecha',
                    'productos.id as producto_id',
                    'productos.nombre',
                    'productos.codigo_barra',
                    'detalles.cantidad',
                    'detalles.subtotal as total_venta',
                    DB::raw('detalles.cantidad * productos.precio_compra as total_costo'),
                    DB::raw('detalles.subtotal - (detalles.cantidad * productos.precio_compra) as utilidad'),
                    DB::raw("(SELECT GROUP_CONCAT(fp.label SEPARATOR ', ')
                        FROM forma_pago_facturas fpf
                        INNER JOIN forma_pagos fp ON fp.id = fpf.forma_pago_id
                        WHERE fpf.factura_id = facturas.id AND fpf.deleted_at IS NULL
                    ) as forma_pago")
                )
                ->join('productos', 'productos.id', '=', 'detalles.producto_id')
                ->join('facturas', 'facturas.id', '=', 'detalles.factura_id')
                ->where('facturas.estado', 'cerrada')
                ->whereNull('facturas.deleted_at')
                ->whereNull('detalles.deleted_at')
                ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
                ->orderBy('facturas.fecha', 'desc')
                ->orderBy('facturas.id', 'desc')
                ->get();

            $totalVenta = $utilidades->sum('total_venta');
            $totalCosto = $utilidades->sum('total_costo');
            $totalUtilidad = $utilidades->sum('utilidad');

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "detalle" => $utilidades,
                    "resumen" => [
                        "total_venta" => $totalVenta,
                        "total_costo" => $totalCosto,
                        "utilidad_bruta" => $totalUtilidad,
                    ]
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar reporte de utilidades.", "data" => []], 200);
        }
    }

    public function abonosCreditos(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;

            $abonos = DetalleCreditos::select(
                    'detalle_creditos.id',
                    'facturas.id as factura_id',
                    'clientes.nombres as cliente',
                    'detalle_creditos.fecha',
                    'detalle_creditos.abono as monto',
                    'forma_pagos.label as forma_pago'
                )
                ->join('creditos', 'creditos.id', '=', 'detalle_creditos.credito_id')
                ->join('clientes', 'clientes.id', '=', 'creditos.cliente_id')
                ->leftJoin('facturas', 'facturas.credito_id', '=', 'creditos.id')
                ->leftJoin('forma_pagos', 'forma_pagos.id', '=', 'detalle_creditos.forma_pago_id')
                ->whereNull('detalle_creditos.deleted_at')
                ->whereNull('creditos.deleted_at')
                ->whereBetween(DB::raw('DATE(detalle_creditos.fecha)'), [$fechaDesde, $fechaHasta])
                ->orderBy('detalle_creditos.fecha', 'asc')
                ->get();

            $totalAbonos = $abonos->sum('monto');

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "total_abonos" => $totalAbonos,
                    "detalle" => $abonos,
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al obtener abonos de créditos.", "data" => []], 200);
        }
    }

    public function inventarioValorizado()
    {
        try {
            $productos = Productos::select(
                    'id',
                    'nombre',
                    'codigo_barra',
                    'stock',
                    'precio_compra',
                    'precio_publico',
                    DB::raw('stock * precio_compra as valor_inventario')
                )
                ->where('stock', '>', 0)
                ->orderBy('valor_inventario', 'desc')
                ->get();

            $totalValorizado = $productos->sum('valor_inventario');
            $totalUnidades = $productos->sum('stock');

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "productos" => $productos,
                    "resumen" => [
                        "total_productos" => $productos->count(),
                        "total_unidades" => $totalUnidades,
                        "total_valorizado" => $totalValorizado,
                    ]
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar inventario valorizado.", "data" => []], 200);
        }
    }

    public function cuentasPorCobrar(Request $request)
    {
        try {
            $creditos = Creditos::with('cliente:id,nombres,cedula')
                ->where('saldo', '>', 0)
                ->select('id', 'cliente_id', 'fecha', 'detalle', 'saldo', 'total', 'created_at')
                ->get()
                ->map(function ($credito) {
                    $diasAtraso = now()->diffInDays($credito->fecha);
                    $rango = '0-30';
                    if ($diasAtraso > 90) $rango = '90+';
                    elseif ($diasAtraso > 60) $rango = '61-90';
                    elseif ($diasAtraso > 30) $rango = '31-60';

                    $credito->dias_atraso = $diasAtraso;
                    $credito->rango_antiguedad = $rango;
                    return $credito;
                });

            $resumenRangos = [
                '0-30' => $creditos->where('rango_antiguedad', '0-30')->sum('saldo'),
                '31-60' => $creditos->where('rango_antiguedad', '31-60')->sum('saldo'),
                '61-90' => $creditos->where('rango_antiguedad', '61-90')->sum('saldo'),
                '90+' => $creditos->where('rango_antiguedad', '90+')->sum('saldo'),
            ];

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "creditos" => $creditos,
                    "resumen_rangos" => $resumenRangos,
                    "total_por_cobrar" => $creditos->sum('saldo'),
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar cuentas por cobrar.", "data" => []], 200);
        }
    }

    public function ventasPorProducto(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;

            $productos = Detalles::select(
                    'productos.id',
                    'productos.nombre',
                    'productos.codigo_barra',
                    DB::raw('SUM(detalles.cantidad) as total_cantidad'),
                    DB::raw('SUM(detalles.subtotal) as total_ventas')
                )
                ->join('productos', 'productos.id', '=', 'detalles.producto_id')
                ->join('facturas', 'facturas.id', '=', 'detalles.factura_id')
                ->where('facturas.estado', 'cerrada')
                ->whereNull('facturas.deleted_at')
                ->whereNull('detalles.deleted_at')
                ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
                ->groupBy('productos.id', 'productos.nombre', 'productos.codigo_barra')
                ->orderBy('total_ventas', 'desc')
                ->get();

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "productos" => $productos,
                    "total_ventas" => $productos->sum('total_ventas'),
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar ventas por producto.", "data" => []], 200);
        }
    }

    public function ventasPorCliente(Request $request)
    {
        try {
            $fechaDesde = $request->fecha_desde;
            $fechaHasta = $request->fecha_hasta;

            $clientes = Facturas::select(
                    'clientes.id',
                    'clientes.nombres',
                    'clientes.cedula',
                    DB::raw('COUNT(facturas.id) as total_facturas'),
                    DB::raw('COALESCE(SUM(facturas.total), 0) as total_compras')
                )
                ->join('clientes', 'clientes.id', '=', 'facturas.cliente_id')
                ->where('facturas.estado', 'cerrada')
                ->whereNull('facturas.deleted_at')
                ->whereNull('clientes.deleted_at')
                ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
                ->groupBy('clientes.id', 'clientes.nombres', 'clientes.cedula')
                ->orderBy('total_compras', 'desc')
                ->get();

            return response()->json([
                "codigo" => 200,
                "Message" => "",
                "data" => [
                    "clientes" => $clientes,
                    "total_ventas" => $clientes->sum('total_compras'),
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar ventas por cliente.", "data" => []], 200);
        }
    }

    public function comparativoMensual(Request $request)
    {
        try {
            $anio = $request->anio;
            $anioDesde = $request->anio_desde;
            $anioHasta = $request->anio_hasta;

            $query = Facturas::select(
                    DB::raw('YEAR(facturas.fecha) as anio'),
                    DB::raw('MONTH(facturas.fecha) as mes'),
                    DB::raw('COUNT(*) as total_facturas'),
                    DB::raw('COALESCE(SUM(facturas.total), 0) as total_ventas')
                )
                ->where('facturas.estado', 'cerrada')
                ->whereNull('facturas.deleted_at');

            if ($anio) {
                $query->whereYear('facturas.fecha', $anio);
            } elseif ($anioDesde && $anioHasta) {
                $query->whereYear('facturas.fecha', '>=', $anioDesde)
                      ->whereYear('facturas.fecha', '<=', $anioHasta);
            }

            $datos = $query->groupBy(DB::raw('YEAR(facturas.fecha)'), DB::raw('MONTH(facturas.fecha)'))
                ->orderBy('anio', 'asc')
                ->orderBy('mes', 'asc')
                ->get();

            return response()->json(["codigo" => 200, "Message" => "", "data" => $datos], 200);
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al generar comparativo mensual.", "data" => []], 200);
        }
    }

    public function exportarExcel(Request $request)
    {
        try {
            $reporte = $this->generarDatosReporte($request);

            if (!$reporte) {
                return response()->json(["codigo" => 400, "Message" => "Tipo de reporte no válido.", "data" => []], 200);
            }

            return Excel::download(
                new ReporteExport($reporte['headers'], $reporte['rows'], $reporte['titulo']),
                $reporte['nombre_archivo'] . '.xlsx'
            );
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al exportar Excel.", "data" => []], 200);
        }
    }

    public function exportarPdf(Request $request)
    {
        try {
            $reporte = $this->generarDatosReporte($request);

            if (!$reporte) {
                return response()->json(["codigo" => 400, "Message" => "Tipo de reporte no válido.", "data" => []], 200);
            }

            $pdf = Pdf::loadView('reportes.generico', [
                'titulo' => $reporte['titulo'],
                'headers' => $reporte['headers'],
                'rows' => $reporte['rows'],
                'filtros' => $reporte['filtros'] ?? [],
                'total' => $reporte['total'] ?? null,
            ])->setPaper('a4', 'landscape');

            return $pdf->download($reporte['nombre_archivo'] . '.pdf');
        } catch (Exception $e) {
            return response()->json(["codigo" => 400, "Message" => "Error al exportar PDF.", "data" => []], 200);
        }
    }

    private function generarDatosReporte(Request $request)
    {
        $tipo = $request->tipo_reporte;

        switch ($tipo) {
            case 'utilidades':
                return $this->datosUtilidades($request);
            case 'inventario_valorizado':
                return $this->datosInventarioValorizado();
            case 'cuentas_por_cobrar':
                return $this->datosCuentasPorCobrar();
            case 'ventas_por_producto':
                return $this->datosVentasPorProducto($request);
            case 'ventas_por_cliente':
                return $this->datosVentasPorCliente($request);
            case 'comparativo_mensual':
                return $this->datosComparativoMensual($request);
            default:
                return null;
        }
    }

    private function datosUtilidades(Request $request)
    {
        $fechaDesde = $request->fecha_desde;
        $fechaHasta = $request->fecha_hasta;

        $datos = Detalles::select(
                'facturas.id as factura_id',
                'facturas.fecha',
                'productos.nombre',
                'productos.codigo_barra',
                'detalles.cantidad as total_cantidad',
                'detalles.subtotal as total_venta',
                DB::raw('detalles.cantidad * productos.precio_compra as total_costo'),
                DB::raw('detalles.subtotal - (detalles.cantidad * productos.precio_compra) as utilidad'),
                DB::raw("(SELECT GROUP_CONCAT(fp.label SEPARATOR ', ')
                    FROM forma_pago_facturas fpf
                    INNER JOIN forma_pagos fp ON fp.id = fpf.forma_pago_id
                    WHERE fpf.factura_id = facturas.id AND fpf.deleted_at IS NULL
                ) as forma_pago")
            )
            ->join('productos', 'productos.id', '=', 'detalles.producto_id')
            ->join('facturas', 'facturas.id', '=', 'detalles.factura_id')
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at')
            ->whereNull('detalles.deleted_at')
            ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
            ->orderBy('facturas.fecha', 'desc')
            ->orderBy('facturas.id', 'desc')
            ->get();

        $rows = $datos->map(function ($item) {
            return [
                $item->factura_id,
                $item->fecha,
                $item->nombre,
                $item->codigo_barra,
                $item->total_cantidad,
                number_format($item->total_venta, 2),
                number_format($item->total_costo, 2),
                number_format($item->utilidad, 2),
                $item->forma_pago,
            ];
        })->toArray();

        return [
            'titulo' => 'Reporte de Utilidades',
            'nombre_archivo' => 'utilidades_' . $fechaDesde . '_' . $fechaHasta,
            'headers' => ['# Fact.', 'Fecha', 'Producto', 'Código', 'Cant.', 'Total Venta', 'Total Costo', 'Utilidad', 'Forma de Pago'],
            'rows' => $rows,
            'filtros' => ['Desde' => $fechaDesde, 'Hasta' => $fechaHasta],
            'total' => $datos->sum('utilidad'),
        ];
    }

    private function datosInventarioValorizado()
    {
        $datos = Productos::select('nombre', 'codigo_barra', 'stock', 'precio_compra', 'precio_publico',
                DB::raw('stock * precio_compra as valor_inventario'))
            ->where('stock', '>', 0)
            ->orderBy('valor_inventario', 'desc')
            ->get();

        $rows = $datos->map(function ($item) {
            return [
                $item->nombre,
                $item->codigo_barra,
                $item->stock,
                number_format($item->precio_compra, 2),
                number_format($item->precio_publico, 2),
                number_format($item->valor_inventario, 2),
            ];
        })->toArray();

        return [
            'titulo' => 'Inventario Valorizado',
            'nombre_archivo' => 'inventario_valorizado_' . now()->format('Y-m-d'),
            'headers' => ['Producto', 'Código', 'Stock', 'P. Compra', 'P. Público', 'Valor Inventario'],
            'rows' => $rows,
            'filtros' => [],
            'total' => $datos->sum('valor_inventario'),
        ];
    }

    private function datosCuentasPorCobrar()
    {
        $datos = Creditos::with('cliente:id,nombres,cedula')
            ->where('saldo', '>', 0)
            ->select('id', 'cliente_id', 'fecha', 'detalle', 'saldo', 'total')
            ->get();

        $rows = $datos->map(function ($item) {
            $diasAtraso = now()->diffInDays($item->fecha);
            $rango = '0-30';
            if ($diasAtraso > 90) $rango = '90+';
            elseif ($diasAtraso > 60) $rango = '61-90';
            elseif ($diasAtraso > 30) $rango = '31-60';

            return [
                $item->cliente->nombres ?? 'N/A',
                $item->cliente->cedula ?? 'N/A',
                $item->fecha,
                number_format($item->total, 2),
                number_format($item->saldo, 2),
                $diasAtraso,
                $rango,
            ];
        })->toArray();

        return [
            'titulo' => 'Cuentas por Cobrar',
            'nombre_archivo' => 'cuentas_por_cobrar_' . now()->format('Y-m-d'),
            'headers' => ['Cliente', 'Cédula', 'Fecha', 'Total', 'Saldo', 'Días', 'Rango'],
            'rows' => $rows,
            'filtros' => [],
            'total' => $datos->sum('saldo'),
        ];
    }

    private function datosVentasPorProducto(Request $request)
    {
        $fechaDesde = $request->fecha_desde;
        $fechaHasta = $request->fecha_hasta;

        $datos = Detalles::select(
                'productos.nombre',
                'productos.codigo_barra',
                DB::raw('SUM(detalles.cantidad) as total_cantidad'),
                DB::raw('SUM(detalles.subtotal) as total_ventas')
            )
            ->join('productos', 'productos.id', '=', 'detalles.producto_id')
            ->join('facturas', 'facturas.id', '=', 'detalles.factura_id')
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at')
            ->whereNull('detalles.deleted_at')
            ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
            ->groupBy('productos.id', 'productos.nombre', 'productos.codigo_barra')
            ->orderBy('total_ventas', 'desc')
            ->get();

        $rows = $datos->map(function ($item) {
            return [
                $item->nombre,
                $item->codigo_barra,
                $item->total_cantidad,
                number_format($item->total_ventas, 2),
            ];
        })->toArray();

        return [
            'titulo' => 'Ventas por Producto',
            'nombre_archivo' => 'ventas_por_producto_' . $fechaDesde . '_' . $fechaHasta,
            'headers' => ['Producto', 'Código', 'Cantidad', 'Total Ventas'],
            'rows' => $rows,
            'filtros' => ['Desde' => $fechaDesde, 'Hasta' => $fechaHasta],
            'total' => $datos->sum('total_ventas'),
        ];
    }

    private function datosVentasPorCliente(Request $request)
    {
        $fechaDesde = $request->fecha_desde;
        $fechaHasta = $request->fecha_hasta;

        $datos = Facturas::select(
                'clientes.nombres',
                'clientes.cedula',
                DB::raw('COUNT(facturas.id) as total_facturas'),
                DB::raw('COALESCE(SUM(facturas.total), 0) as total_compras')
            )
            ->join('clientes', 'clientes.id', '=', 'facturas.cliente_id')
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at')
            ->whereNull('clientes.deleted_at')
            ->whereBetween(DB::raw('DATE(facturas.fecha)'), [$fechaDesde, $fechaHasta])
            ->groupBy('clientes.id', 'clientes.nombres', 'clientes.cedula')
            ->orderBy('total_compras', 'desc')
            ->get();

        $rows = $datos->map(function ($item) {
            return [
                $item->nombres,
                $item->cedula,
                $item->total_facturas,
                number_format($item->total_compras, 2),
            ];
        })->toArray();

        return [
            'titulo' => 'Ventas por Cliente',
            'nombre_archivo' => 'ventas_por_cliente_' . $fechaDesde . '_' . $fechaHasta,
            'headers' => ['Cliente', 'Cédula', 'Facturas', 'Total Compras'],
            'rows' => $rows,
            'filtros' => ['Desde' => $fechaDesde, 'Hasta' => $fechaHasta],
            'total' => $datos->sum('total_compras'),
        ];
    }

    private function datosComparativoMensual(Request $request)
    {
        $anio = $request->anio;
        $anioDesde = $request->anio_desde;
        $anioHasta = $request->anio_hasta;

        $query = Facturas::select(
                DB::raw('YEAR(facturas.fecha) as anio'),
                DB::raw('MONTH(facturas.fecha) as mes'),
                DB::raw('COUNT(*) as total_facturas'),
                DB::raw('COALESCE(SUM(facturas.total), 0) as total_ventas')
            )
            ->where('facturas.estado', 'cerrada')
            ->whereNull('facturas.deleted_at');

        if ($anio) {
            $query->whereYear('facturas.fecha', $anio);
        } elseif ($anioDesde && $anioHasta) {
            $query->whereYear('facturas.fecha', '>=', $anioDesde)
                  ->whereYear('facturas.fecha', '<=', $anioHasta);
        }

        $datos = $query->groupBy(DB::raw('YEAR(facturas.fecha)'), DB::raw('MONTH(facturas.fecha)'))
            ->orderBy('anio', 'asc')
            ->orderBy('mes', 'asc')
            ->get();

        $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $rows = $datos->map(function ($item) use ($meses) {
            return [
                $item->anio,
                $meses[$item->mes] ?? $item->mes,
                $item->total_facturas,
                number_format($item->total_ventas, 2),
            ];
        })->toArray();

        $filtroTexto = $anio ? $anio : ($anioDesde . ' - ' . $anioHasta);

        return [
            'titulo' => 'Comparativo Mensual de Ventas',
            'nombre_archivo' => 'comparativo_mensual_' . ($anio ?? $anioDesde . '_' . $anioHasta),
            'headers' => ['Año', 'Mes', 'Facturas', 'Total Ventas'],
            'rows' => $rows,
            'filtros' => ['Período' => $filtroTexto],
            'total' => $datos->sum('total_ventas'),
        ];
    }
}
