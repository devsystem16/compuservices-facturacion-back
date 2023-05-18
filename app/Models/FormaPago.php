<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forma_pagos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nombre', 'label', 'codigo', 'cash', 'default'];
}
