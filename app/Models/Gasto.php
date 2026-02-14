<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gasto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gastos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['categoria_gasto_id', 'periodo_id', 'concepto', 'monto', 'fecha', 'observacion', 'usuario_id'];

    public function categoriaGasto()
    {
        return $this->belongsTo(CategoriaGasto::class, 'categoria_gasto_id', 'id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id', 'id');
    }
}
