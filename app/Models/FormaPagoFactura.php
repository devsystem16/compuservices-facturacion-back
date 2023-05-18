<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FormaPagoFactura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forma_pago_facturas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['factura_id', 'forma_pago_id', 'valor', 'observacion'];

    public function Factura()
    {
        return $this->belongsTo(Facturas::class,  'factura_id');
    }

    public function FormaPago()
    {
        return $this->belongsTo(FormaPago::class,  'forma_pago_id');
    }
}
