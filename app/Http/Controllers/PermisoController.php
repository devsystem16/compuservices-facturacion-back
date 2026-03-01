<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * GET /api/permisos
     * Retorna todos los permisos agrupados por módulo.
     */
    public function index()
    {
        $permisos = Permiso::orderBy('modulo')->orderBy('tipo')->orderBy('codigo')->get();
        $agrupados = $permisos->groupBy('modulo');

        return response()->json([
            'data' => $agrupados,
        ]);
    }

    /**
     * GET /api/tipo-usuarios/{id}/permisos
     * Retorna el tipo de usuario con sus permisos activos.
     */
    public function permisosPorTipo($id)
    {
        $tipoUsuario = TipoUsuario::find($id);

        if (!$tipoUsuario) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'Tipo de usuario no encontrado',
            ], 404);
        }

        $permisos = $tipoUsuario->permisos()
            ->wherePivot('activo', true)
            ->pluck('codigo')
            ->toArray();

        return response()->json([
            'tipo_usuario' => [
                'id' => $tipoUsuario->id,
                'tipo' => $tipoUsuario->tipo,
            ],
            'permisos' => $permisos,
        ]);
    }

    /**
     * POST /api/tipo-usuarios/{id}/permisos
     * Asigna permisos a un tipo de usuario (sync).
     */
    public function asignarPermisos(Request $request, $id)
    {
        $tipoUsuario = TipoUsuario::find($id);

        if (!$tipoUsuario) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'Tipo de usuario no encontrado',
            ], 404);
        }

        // No permitir modificar los permisos del SUPER USUARIO
        if (strtoupper($tipoUsuario->tipo) === 'SUPER USUARIO') {
            return response()->json([
                'codigo' => 403,
                'mensaje' => 'No se pueden modificar los permisos del Super Usuario.',
            ], 403);
        }

        $request->validate([
            'permisos' => 'required|array',
            'permisos.*' => 'string|exists:permisos,codigo',
        ]);

        $permisoIds = Permiso::whereIn('codigo', $request->permisos)
            ->pluck('id')
            ->toArray();

        $tipoUsuario->permisos()->sync($permisoIds);

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Permisos actualizados correctamente',
            'total_asignados' => count($permisoIds),
        ]);
    }

    /**
     * GET /api/mis-permisos/{tipoUsuarioId}
     * Retorna array plano de códigos de permisos activos para ese tipo.
     */
    public function misPermisos($tipoUsuarioId)
    {
        $tipoUsuario = TipoUsuario::find($tipoUsuarioId);

        if (!$tipoUsuario) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'Tipo de usuario no encontrado',
            ], 404);
        }

        $permisos = $tipoUsuario->permisos()
            ->wherePivot('activo', true)
            ->pluck('codigo')
            ->toArray();

        return response()->json([
            'permisos' => $permisos,
        ]);
    }
}
