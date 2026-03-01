<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAsiento extends Model
{
    use HasFactory;

    protected $table = 'detalle_asientos';

    protected $fillable = [
        'asiento_contable_id', 'cuenta_contable_id',
        'descripcion', 'debe', 'haber',
    ];

    protected $casts = [
        'debe' => 'decimal:2',
        'haber' => 'decimal:2',
    ];

    public function asientoContable()
    {
        return $this->belongsTo(AsientoContable::class, 'asiento_contable_id');
    }

    public function cuentaContable()
    {
        return $this->belongsTo(CuentaContable::class, 'cuenta_contable_id');
    }
}
