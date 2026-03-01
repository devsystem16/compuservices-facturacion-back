<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuentaContable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cuenta_contables';

    protected $fillable = [
        'codigo', 'nombre', 'tipo', 'naturaleza',
        'parent_id', 'nivel', 'es_detalle', 'activo',
    ];

    protected $casts = [
        'es_detalle' => 'boolean',
        'activo' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(CuentaContable::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CuentaContable::class, 'parent_id')->orderBy('codigo');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function detalleAsientos()
    {
        return $this->hasMany(DetalleAsiento::class, 'cuenta_contable_id');
    }
}
