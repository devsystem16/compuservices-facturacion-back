<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proveedores';
    protected $dates = ['deleted_at'];
    protected $fillable = ['codigo', 'nombre', 'telefono', 'email', 'direccion', 'ruc_cedula', 'contacto', 'activo'];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'proveedor_id', 'id');
    }
}
