<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retiros extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'retiros';
    protected $dates = ['deleted_at'];
    protected $fillable =  [
        'estacion_id',
        'periodo_id',
        'concepto',
        'valorRetiro',
        'observacion'
    ];

    // public function usuarioApertura()
    // {
    //     return $this->belongsTo(Usuarios::class, 'usuario_id_apertura');
    // }

    // public function usuarioCierre()
    // {
    //     return $this->belongsTo(Usuarios::class, 'usuario_id_cierre');
    // }

    // public function controlEstacions()
    // {
    //     return $this->hasMany(ControlEstacion::class, 'periodo_id');
    // }
}
