<?php

namespace App\Http\Controllers;

use App\Models\CuentaContable;
use Illuminate\Http\Request;

class CuentaContableController extends Controller
{
    /**
     * GET /api/cuenta-contables
     * Listado en árbol (solo cuentas raíz con hijos recursivos).
     */
    public function index()
    {
        $cuentas = CuentaContable::whereNull('parent_id')
            ->with('childrenRecursive')
            ->orderBy('codigo')
            ->get();

        return response()->json(['data' => $cuentas]);
    }

    /**
     * GET /api/cuenta-contables/lista
     * Listado plano de cuentas de detalle (para selects/dropdowns).
     */
    public function lista()
    {
        $cuentas = CuentaContable::where('es_detalle', true)
            ->where('activo', true)
            ->orderBy('codigo')
            ->get(['id', 'codigo', 'nombre', 'tipo', 'naturaleza']);

        return response()->json(['data' => $cuentas]);
    }

    /**
     * POST /api/cuenta-contables
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:20|unique:cuenta_contables,codigo',
            'nombre' => 'required|string|max:200',
            'tipo' => 'required|in:activo,pasivo,patrimonio,ingreso,gasto',
            'naturaleza' => 'required|in:deudora,acreedora',
            'parent_id' => 'nullable|exists:cuenta_contables,id',
            'nivel' => 'required|integer|min:1|max:5',
            'es_detalle' => 'required|boolean',
        ]);

        $cuenta = CuentaContable::create($request->only([
            'codigo', 'nombre', 'tipo', 'naturaleza',
            'parent_id', 'nivel', 'es_detalle',
        ]));

        return response()->json([
            'codigo' => 201,
            'mensaje' => 'Cuenta contable creada correctamente',
            'data' => $cuenta,
        ], 201);
    }

    /**
     * GET /api/cuenta-contables/{id}
     */
    public function show($id)
    {
        $cuenta = CuentaContable::with('children', 'parent')->find($id);

        if (!$cuenta) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Cuenta no encontrada'], 404);
        }

        return response()->json(['data' => $cuenta]);
    }

    /**
     * PUT /api/cuenta-contables/{id}
     */
    public function update(Request $request, $id)
    {
        $cuenta = CuentaContable::find($id);

        if (!$cuenta) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Cuenta no encontrada'], 404);
        }

        $request->validate([
            'codigo' => 'sometimes|string|max:20|unique:cuenta_contables,codigo,' . $id,
            'nombre' => 'sometimes|string|max:200',
            'tipo' => 'sometimes|in:activo,pasivo,patrimonio,ingreso,gasto',
            'naturaleza' => 'sometimes|in:deudora,acreedora',
            'parent_id' => 'nullable|exists:cuenta_contables,id',
            'nivel' => 'sometimes|integer|min:1|max:5',
            'es_detalle' => 'sometimes|boolean',
            'activo' => 'sometimes|boolean',
        ]);

        $cuenta->update($request->only([
            'codigo', 'nombre', 'tipo', 'naturaleza',
            'parent_id', 'nivel', 'es_detalle', 'activo',
        ]));

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Cuenta contable actualizada correctamente',
            'data' => $cuenta->fresh(),
        ]);
    }

    /**
     * DELETE /api/cuenta-contables/{id}
     */
    public function destroy($id)
    {
        $cuenta = CuentaContable::find($id);

        if (!$cuenta) {
            return response()->json(['codigo' => 404, 'mensaje' => 'Cuenta no encontrada'], 404);
        }

        // No eliminar si tiene movimientos
        if ($cuenta->detalleAsientos()->exists()) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'No se puede eliminar: la cuenta tiene movimientos contables',
            ], 422);
        }

        // No eliminar si tiene hijos
        if ($cuenta->children()->exists()) {
            return response()->json([
                'codigo' => 422,
                'mensaje' => 'No se puede eliminar: la cuenta tiene subcuentas',
            ], 422);
        }

        $cuenta->delete();

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Cuenta contable eliminada correctamente',
        ]);
    }
}
