<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pantallapos extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_usuario_id',
        'href',
        'icon',
        'title',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Pantallapos::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Pantallapos::class, 'parent_id');
    }
}
