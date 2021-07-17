<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Detalles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='detalles';
    protected $dates = ['deleted_at'];
    protected $fillable = ['factura_id','producto_id','cantidad','subtotal' ];

}
