<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    protected $fillable = ['codigo', 'modulo', 'tipo', 'descripcion'];

    public function tipoUsuarios()
    {
        return $this->belongsToMany(TipoUsuario::class, 'tipo_usuario_permisos')
            ->withPivot('activo')
            ->withTimestamps();
    }
}
