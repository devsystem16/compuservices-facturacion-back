<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbonoOrdenes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'abono_ordenes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['orden_id', 'abono', 'fecha', 'comentario'];
}
