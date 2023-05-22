<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleProforma extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detalle_proformas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['proforma_id', 'producto_id', 'cantidad', 'subtotal', 'precio_tipo'];

    public function proforma()
    {
        return $this->belongsTo(Proforma::class, 'proforma_id');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}
