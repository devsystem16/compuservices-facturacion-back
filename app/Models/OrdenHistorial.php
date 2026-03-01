<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenHistorial extends Model
{
    public $timestamps = false;

    protected $table = 'orden_historial';

    protected $fillable = ['orden_id', 'usuario_id', 'evento', 'detalle', 'created_at'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    const EVENTOS = [
        'ingreso_registrado' => 'Equipo recibido',
        'diagnostico_iniciado' => 'Diagnóstico iniciado',
        'trabajo_actualizado' => 'Trabajo en progreso',
        'total_definido' => 'Costo de reparación definido',
        'abono_registrado' => 'Pago parcial registrado',
        'completado' => 'Reparación completada',
        'entregado' => 'Equipo entregado al cliente',
    ];

    public function orden()
    {
        return $this->belongsTo(Ordenes::class, 'orden_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    /**
     * Registrar un evento en el historial.
     */
    public static function registrar($ordenId, $evento, $detalle = null, $usuarioId = null)
    {
        return self::create([
            'orden_id' => $ordenId,
            'usuario_id' => $usuarioId,
            'evento' => $evento,
            'detalle' => $detalle,
            'created_at' => now(),
        ]);
    }
}
