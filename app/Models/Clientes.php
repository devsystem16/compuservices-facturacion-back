<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['cedula', 'nombres', 'telefono', 'direccion', 'correo', 'observacion'];

    public function facturas()
    {
        return $this->hasMany(Facturas::class, 'cliente_id', 'id');
    }

    public function creditos()
    {
        return $this->hasMany(Creditos::class, 'cliente_id', 'id');
    }

    public function proformas()
    {
        return $this->hasMany(Proforma::class, 'cliente_id');
    }
}
