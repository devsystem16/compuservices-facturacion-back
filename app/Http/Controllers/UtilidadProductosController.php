<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Exports\ReporteExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UtilidadProductosController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25);

        $query = Productos::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_barra', 'like', "%{$search}%");
            });
        }

        // bodega_id filter for future use (currently stock is global)
        // if ($request->filled('bodega_id')) { ... }

        $productos = $query->paginate($perPage);

        $data = collect($productos->items())->map(function ($p) {
            $utilidad = $p->precio_publico - $p->precio_compra;
            $margen = $p->precio_compra > 0
                ? round(($utilidad / $p->precio_compra) * 100, 2)
                : 0;

            return [
                'id' => $p->id,
                'codigo_barra' => $p->codigo_barra,
                'nombre' => $p->nombre,
                'stock' => $p->stock,
                'precio_compra' => $p->precio_compra,
                'precio_publico' => $p->precio_publico,
                'utilidad' => round($utilidad, 2),
                'margen' => $margen,
                'costo_total' => round($p->precio_compra * $p->stock, 2),
                'utilidad_total' => round($utilidad * $p->stock, 2),
            ];
        });

        // Totales globales (de la consulta completa, no solo la página)
        $totalesQuery = Productos::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $totalesQuery->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_barra', 'like', "%{$search}%");
            });
        }

        $totales = $totalesQuery->selectRaw('
            SUM(precio_compra * stock) as total_costo,
            SUM((precio_publico - precio_compra) * stock) as total_utilidad,
            SUM(stock) as total_stock
        ')->first();

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $productos->currentPage(),
                'per_page' => $productos->perPage(),
                'total' => $productos->total(),
                'last_page' => $productos->lastPage(),
            ],
            'totales' => [
                'total_costo' => round($totales->total_costo ?? 0, 2),
                'total_utilidad' => round($totales->total_utilidad ?? 0, 2),
                'total_stock' => (int) ($totales->total_stock ?? 0),
            ],
        ]);
    }

    public function exportExcel(Request $request)
    {
        $query = Productos::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_barra', 'like', "%{$search}%");
            });
        }

        $productos = $query->get();

        $headers = [
            'Codigo', 'Producto', 'Stock', 'P. Compra', 'P. Venta',
            'Utilidad Unit.', 'Margen %', 'Costo Total', 'Utilidad Total'
        ];

        $rows = $productos->map(function ($p) {
            $utilidad = $p->precio_publico - $p->precio_compra;
            $margen = $p->precio_compra > 0
                ? round(($utilidad / $p->precio_compra) * 100, 2)
                : 0;

            return [
                $p->codigo_barra,
                $p->nombre,
                $p->stock,
                $p->precio_compra,
                $p->precio_publico,
                round($utilidad, 2),
                $margen,
                round($p->precio_compra * $p->stock, 2),
                round($utilidad * $p->stock, 2),
            ];
        })->toArray();

        return Excel::download(
            new ReporteExport($headers, $rows, 'Utilidad Productos'),
            'utilidad_productos.xlsx'
        );
    }
}
