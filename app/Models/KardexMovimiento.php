<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KardexMovimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kardex_movimientos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'codigo',
        'producto',
        'bodega_id',
        'detalle',
        'tipo',
        'entrada',
        'salida',
        'saldo',
        'costo_unitario',
        'costo_total',
        'usuario',
        'referencia',
        'producto_id',
    ];

    public function productoRelacion()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'bodega_id');
    }
}
