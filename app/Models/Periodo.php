<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'periodos';
    protected $dates = ['deleted_at'];
    protected $fillable =  [
        'fecha_apertura',
        'fecha_cierre',
        'usuario_id_apertura',
        'usuario_id_cierre',
        'estado',
        'fondo_asignado',
        'observaciones',
    ];


    public function usuarioApertura()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id_apertura');
    }

    public function usuarioCierre()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id_cierre');
    }

    public function controlEstacions()
    {
        return $this->hasMany(ControlEstacion::class, 'periodo_id');
    }
}
