<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsientoContable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asientos_contables';

    protected $fillable = [
        'numero', 'fecha', 'descripcion', 'tipo',
        'referencia_tipo', 'referencia_id', 'estado',
        'usuario_id', 'total_debe', 'total_haber',
    ];

    protected $casts = [
        'fecha' => 'date',
        'total_debe' => 'decimal:2',
        'total_haber' => 'decimal:2',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleAsiento::class, 'asiento_contable_id');
    }

    public function detallesConCuenta()
    {
        return $this->hasMany(DetalleAsiento::class, 'asiento_contable_id')
            ->with('cuentaContable:id,codigo,nombre');
    }

    public static function siguienteNumero()
    {
        $ultimo = self::withTrashed()->max('numero');
        return ($ultimo ?? 0) + 1;
    }
}
