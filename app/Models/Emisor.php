<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruc',
        'razon_social',
        'nombre_comercial',
        'direccion_matriz',
        'direccion_establecimiento',
        'cod_establecimiento',
        'cod_punto_emision',
        'obligado_contabilidad',
        'path_firma',
        'pass_firma',
        'ambiente',
        'is_active'
    ];
}
