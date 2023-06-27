<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControlEstacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'control_estacions';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'estacion_id',
        'periodo_id',
        'valor_fondo_asignado',
        'valor_fondo_retirado',
        'usuario_fondo_asignado',
        'usuario_fondo_retiro',
        'FechaFondoAsignado',
        'FechaFondoRetirado',
        'estado',
        'motivo_descuadre',
    ];

    public function estacion()
    {
        return $this->belongsTo(Estacion::class, 'estacion_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
