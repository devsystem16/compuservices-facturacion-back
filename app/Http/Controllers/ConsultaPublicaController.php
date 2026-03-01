<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Clientes;
use App\Models\OrdenHistorial;
use Illuminate\Http\Request;

class ConsultaPublicaController extends Controller
{
    /**
     * POST /api/public/consulta-orden
     * Endpoint público para que el cliente consulte el estado de su orden.
     */
    public function consultarOrden(Request $request)
    {
        // Validar datos
        $request->validate([
            'cedula' => 'required|string|min:10|max:13',
            'orden_id' => 'required|integer|min:1',
        ], [
            'cedula.required' => 'Debe ingresar su cédula.',
            'orden_id.required' => 'Debe ingresar el número de orden.',
        ]);

        // Buscar orden activa (estado = 1 means not logically deleted)
        $orden = Ordenes::where('id', $request->orden_id)
            ->where('estado', 1)
            ->first();

        if (!$orden) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'No se encontró ninguna orden con los datos proporcionados.',
            ], 404);
        }

        // Verificar que la cédula del cliente coincida
        $cliente = Clientes::where('id', $orden->cliente_id)
            ->where('cedula', $request->cedula)
            ->first();

        if (!$cliente) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'No se encontró ninguna orden con los datos proporcionados.',
            ], 404);
        }

        // Si no es visible para el cliente, tratar como no encontrada
        if (!$orden->visible_cliente) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'No se encontró ninguna orden con los datos proporcionados.',
            ], 404);
        }

        // Cargar historial
        $historial = OrdenHistorial::where('orden_id', $orden->id)
            ->orderBy('created_at', 'asc')
            ->get();

        // Labels de estado
        $estadoLabels = [
            'pendiente' => 'Pendiente',
            'en_proceso' => 'En Proceso',
            'completado' => 'Completado',
            'entregado' => 'Entregado',
        ];

        $eventLabels = OrdenHistorial::EVENTOS;

        // Obtener nombre del técnico (solo primer nombre)
        $ultimoTecnico = null;
        if ($orden->user_update_work) {
            $tecnico = \App\Models\Usuarios::find($orden->user_update_work);
            if ($tecnico) {
                $nombres = explode(' ', trim($tecnico->nombres));
                $ultimoTecnico = $nombres[0] ?? null;
            }
        }

        // Armar historial para respuesta
        $historialResponse = $historial->map(function ($h) use ($eventLabels) {
            return [
                'fecha' => $h->created_at->format('Y-m-d H:i:s'),
                'evento' => $eventLabels[$h->evento] ?? $h->evento,
                'detalle' => $h->detalle,
            ];
        });

        return response()->json([
            'codigo' => 200,
            'orden' => [
                'id' => $orden->id,
                'fecha_ingreso' => $orden->fecha . ' ' . ($orden->created_at ? $orden->created_at->format('H:i:s') : '00:00:00'),
                'estado' => $orden->estado_reparacion,
                'estado_label' => $estadoLabels[$orden->estado_reparacion] ?? $orden->estado_reparacion,
                'equipo' => [
                    'tipo' => $orden->equipo,
                    'marca' => $orden->marca,
                    'modelo' => $orden->modelo,
                    'serie' => $orden->serie,
                ],
                'falla' => $orden->falla,
                'trabajo_realizado' => $orden->trabajo,
                'observacion' => $orden->observacion,
                'ultimo_tecnico' => $ultimoTecnico,
                'ultima_actualizacion' => $orden->updated_at ? $orden->updated_at->format('Y-m-d H:i:s') : null,
                'financiero' => [
                    'total' => (float) $orden->total,
                    'abono' => (float) $orden->abono,
                    'saldo' => (float) $orden->saldo,
                ],
                'historial' => $historialResponse,
            ],
        ]);
    }

    /**
     * POST /api/public/cambiar-estado-orden
     * Endpoint interno para cambiar estado_reparacion (para uso desde el panel admin).
     */
    public function cambiarEstado(Request $request)
    {
        $request->validate([
            'orden_id' => 'required|integer|exists:ordenes,id',
            'estado_reparacion' => 'required|in:pendiente,en_proceso,completado,entregado',
            'usuario_id' => 'nullable|integer',
        ]);

        $orden = Ordenes::findOrFail($request->orden_id);
        $estadoAnterior = $orden->estado_reparacion;
        $orden->estado_reparacion = $request->estado_reparacion;

        if ($request->estado_reparacion === 'completado' && $estadoAnterior !== 'completado') {
            $orden->fecha_completado = now();
            OrdenHistorial::registrar($orden->id, 'completado', null, $request->usuario_id);
        }

        if ($request->estado_reparacion === 'entregado' && $estadoAnterior !== 'entregado') {
            $orden->fecha_entregado = now();
            OrdenHistorial::registrar($orden->id, 'entregado', null, $request->usuario_id);
        }

        if ($request->estado_reparacion === 'en_proceso' && $estadoAnterior === 'pendiente') {
            OrdenHistorial::registrar($orden->id, 'diagnostico_iniciado', null, $request->usuario_id);
        }

        $orden->save();

        $estadoLabels = [
            'pendiente' => 'Pendiente',
            'en_proceso' => 'En Proceso',
            'completado' => 'Completado',
            'entregado' => 'Entregado',
        ];

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Estado actualizado a: ' . $estadoLabels[$request->estado_reparacion],
            'orden' => $orden,
        ]);
    }
}
