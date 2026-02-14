<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaGasto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categoria_gastos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nombre', 'descripcion', 'color', 'activo'];

    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'categoria_gasto_id', 'id');
    }
}
