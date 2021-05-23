<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creditos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='creditos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['cliente_id','fecha','detalle','saldo','total'];


    public function detallesCreditos(){
        return $this->hasMany( DetalleCreditos::class, 'credito_id', 'id');
    }

}
