<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'tipo_usuario_permisos')
            ->withPivot('activo')
            ->withTimestamps();
    }
}
