<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'productos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre', 'descripcion', 'codigo_barra', 'precio_publico', 'precio_tecnico', 'precio_compra', 'precio_distribuidor', 'stock',
        'gravaIva', 'pocentaje'
    ];
}
