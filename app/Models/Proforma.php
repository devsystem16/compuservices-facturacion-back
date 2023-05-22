<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proforma extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'proformas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['cliente_id', 'usuario_id', 'forma_pago_id', 'fecha_emision', 'fecha_vencimiento', 'subtotal', 'iva', 'total', 'observacion', 'estado'];

    public function detallesProforma()
    {
        return $this->hasMany(DetalleProforma::class, 'proforma_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }
}
