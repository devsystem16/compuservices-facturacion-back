<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bodega extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bodegas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nombre', 'direccion', 'estado'];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function movimientos()
    {
        return $this->hasMany(KardexMovimiento::class, 'bodega_id');
    }
}
