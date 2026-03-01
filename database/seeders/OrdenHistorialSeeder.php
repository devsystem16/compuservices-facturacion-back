<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ordenes;
use App\Models\OrdenHistorial;

class OrdenHistorialSeeder extends Seeder
{
    /**
     * Genera historial retroactivo para órdenes existentes
     * basándose en los datos actuales.
     */
    public function run()
    {
        $ordenes = Ordenes::where('estado', 1)->get();
        $count = 0;

        foreach ($ordenes as $orden) {
            // Evitar duplicar si ya tiene historial
            if (OrdenHistorial::where('orden_id', $orden->id)->exists()) {
                continue;
            }

            // 1. Ingreso registrado (siempre)
            OrdenHistorial::create([
                'orden_id' => $orden->id,
                'usuario_id' => $orden->usuario_id,
                'evento' => 'ingreso_registrado',
                'detalle' => 'Ingreso registrado en el sistema',
                'created_at' => $orden->created_at ?? $orden->fecha,
            ]);

            // 2. Si tiene trabajo → diagnóstico/trabajo
            if (!empty($orden->trabajo) && $orden->trabajo !== '') {
                OrdenHistorial::create([
                    'orden_id' => $orden->id,
                    'usuario_id' => $orden->user_update_work,
                    'evento' => 'diagnostico_iniciado',
                    'detalle' => $orden->trabajo,
                    'created_at' => $orden->updated_at ?? $orden->created_at,
                ]);
            }

            // 3. Si tiene total > 0 → total definido
            if ($orden->total > 0) {
                OrdenHistorial::create([
                    'orden_id' => $orden->id,
                    'evento' => 'total_definido',
                    'detalle' => 'Total: $' . number_format($orden->total, 2),
                    'created_at' => $orden->updated_at ?? $orden->created_at,
                ]);
            }

            // 4. Si tiene abono > 0 → abono registrado
            if ($orden->abono > 0) {
                OrdenHistorial::create([
                    'orden_id' => $orden->id,
                    'evento' => 'abono_registrado',
                    'detalle' => 'Abono de $' . number_format($orden->abono, 2),
                    'created_at' => $orden->updated_at ?? $orden->created_at,
                ]);
            }

            // 5. Si estado_reparacion es completado → completado
            if ($orden->estado_reparacion === 'completado') {
                OrdenHistorial::create([
                    'orden_id' => $orden->id,
                    'evento' => 'completado',
                    'detalle' => null,
                    'created_at' => $orden->updated_at ?? $orden->created_at,
                ]);
            }

            $count++;
        }

        echo "Historial generado para {$count} órdenes." . PHP_EOL;
    }
}
