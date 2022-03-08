<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordenes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ordenes';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cliente_id', 'usuario_id', 'fecha', 'equipo', 'marca', 'modelo',
        'serie', 'falla', 'trabajo', 'total', 'saldo', 'abono', 'observacion', 'camara', 'teclado',
        'microfono', 'parlantes', 'estado', 'estadoOrden', 'last_user_update', 'user_update_work', 'factura_relacionada'
    ];
}
