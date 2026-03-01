<?php

namespace App\Http\Controllers;

use App\Models\Pantallapos;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PantallaposController extends Controller
{
    /**
     * GET /api/pantallapos/acceso/obtener-acceso/{tipoUsuario}
     * Endpoint existente: retorna las pantallas asignadas a un tipo de usuario (con hijos).
     */
    public function obtenerAccesos($tipoUsuario)
    {
        return Pantallapos::where('tipo_usuario_id', $tipoUsuario)
            ->whereNull('parent_id')
            ->with('children')
            ->get();
    }

    /**
     * GET /api/pantallas/catalogo
     * Retorna el catalogo completo de pantallas disponibles (las del SUPER USUARIO).
     * Sirve como "master list" para asignar pantallas a otros tipos de usuario.
     */
    public function catalogo()
    {
        $superUsuario = TipoUsuario::whereRaw('UPPER(tipo) = ?', ['SUPER USUARIO'])->first();
        $tipoId = $superUsuario ? $superUsuario->id : 1;

        $pantallas = Pantallapos::where('tipo_usuario_id', $tipoId)
            ->whereNull('parent_id')
            ->with('children')
            ->get();

        return response()->json([
            'catalogo' => $pantallas,
        ]);
    }

    /**
     * GET /api/pantallas/tipo-usuario/{id}
     * Retorna las pantallas asignadas a un tipo de usuario como lista plana de hrefs.
     */
    public function pantallasPorTipo($id)
    {
        $pantallas = Pantallapos::where('tipo_usuario_id', $id)->get();

        // Retornar hrefs asignados (excluyendo padres sin href que son solo contenedores)
        $hrefs = $pantallas->whereNotNull('href')
            ->where('href', '!=', '')
            ->pluck('href')
            ->values()
            ->toArray();

        return response()->json([
            'tipo_usuario_id' => (int) $id,
            'pantallas' => $hrefs,
        ]);
    }

    /**
     * POST /api/pantallas/tipo-usuario/{id}/asignar
     * Asigna pantallas a un tipo de usuario.
     * Recibe array de hrefs del catalogo y sincroniza.
     */
    public function asignarPantallas(Request $request, $id)
    {
        // No permitir modificar las pantallas del SUPER USUARIO
        $tipoUsuario = TipoUsuario::find($id);
        if ($tipoUsuario && strtoupper($tipoUsuario->tipo) === 'SUPER USUARIO') {
            return response()->json([
                'codigo' => 403,
                'mensaje' => 'No se pueden modificar las pantallas del Super Usuario.',
            ], 403);
        }

        $request->validate([
            'pantallas' => 'required|array',
            'pantallas.*' => 'string',
        ]);

        $hrefsSeleccionados = $request->pantallas;

        // Obtener las pantallas del catalogo (Super Usuario)
        $superUsuario = TipoUsuario::whereRaw('UPPER(tipo) = ?', ['SUPER USUARIO'])->first();
        $catalogoTipoId = $superUsuario ? $superUsuario->id : 1;
        $catalogoItems = Pantallapos::where('tipo_usuario_id', $catalogoTipoId)->get();

        DB::transaction(function () use ($id, $hrefsSeleccionados, $catalogoItems) {
            // Eliminar todas las pantallas actuales del tipo de usuario
            Pantallapos::where('tipo_usuario_id', $id)->delete();

            // Mapeo de parent_id viejo (admin) → parent_id nuevo (tipo destino)
            $parentMap = [];

            // Primero: crear los padres necesarios (items sin href que son contenedores)
            foreach ($catalogoItems->whereNull('parent_id') as $item) {
                // Es un padre contenedor (href null/vacio)?
                if (empty($item->href)) {
                    // Verificar si al menos un hijo esta seleccionado
                    $hijos = $catalogoItems->where('parent_id', $item->id);
                    $tieneHijoSeleccionado = $hijos->whereIn('href', $hrefsSeleccionados)->isNotEmpty();

                    if ($tieneHijoSeleccionado) {
                        $nuevoPadre = Pantallapos::create([
                            'tipo_usuario_id' => $id,
                            'href' => $item->href,
                            'icon' => $item->icon,
                            'title' => $item->title,
                            'parent_id' => null,
                        ]);
                        $parentMap[$item->id] = $nuevoPadre->id;
                    }
                } else {
                    // Es una pantalla raiz (sin parent) → crear si esta seleccionada
                    if (in_array($item->href, $hrefsSeleccionados)) {
                        Pantallapos::create([
                            'tipo_usuario_id' => $id,
                            'href' => $item->href,
                            'icon' => $item->icon,
                            'title' => $item->title,
                            'parent_id' => null,
                        ]);
                    }
                }
            }

            // Segundo: crear los hijos seleccionados
            foreach ($catalogoItems->whereNotNull('parent_id') as $item) {
                if (in_array($item->href, $hrefsSeleccionados) && isset($parentMap[$item->parent_id])) {
                    Pantallapos::create([
                        'tipo_usuario_id' => $id,
                        'href' => $item->href,
                        'icon' => $item->icon,
                        'title' => $item->title,
                        'parent_id' => $parentMap[$item->parent_id],
                    ]);
                }
            }
        });

        // Retornar resultado
        $total = Pantallapos::where('tipo_usuario_id', $id)->count();

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Pantallas actualizadas correctamente',
            'total_asignadas' => $total,
        ]);
    }
}
