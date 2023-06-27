<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCreditos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detalle_creditos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['credito_id', 'forma_pago_id', 'abono', 'fecha', 'comentario', 'periodo_id'];


    public function FormaPago()
    {
        return $this->belongsTo(FormaPago::class,  'forma_pago_id');
    }
}
