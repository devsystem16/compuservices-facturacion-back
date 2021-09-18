<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facturas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'facturas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['cliente_id', 'fecha', 'subtotal', 'iva', 'total', 'observacion', 'estado', 'es_credito', 'credito_id'];

    public function detalles()
    {
        return $this->hasMany(Detalles::class, 'factura_id', 'id');
    }
}
