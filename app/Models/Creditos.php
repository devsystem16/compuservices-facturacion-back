<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creditos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'creditos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['cliente_id', 'fecha', 'detalle', 'saldo', 'total', 'periodo_id'];


    public function detallesCreditos()
    {
        return $this->hasMany(DetalleCreditos::class, 'credito_id', 'id');
    }

         public function cliente()
        {
            return $this->belongsTo(Clientes::class);
        }

        public function detalles()
        {
            return $this->hasMany(DetalleCreditos::class, 'credito_id');
        }

        public function factura()
        {
           return $this->hasOne(Facturas::class, 'credito_id', 'id');
        }


}
