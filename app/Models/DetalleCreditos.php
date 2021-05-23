<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCreditos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='clientes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['credito_id','abono','fecha','comentario' ];


}
