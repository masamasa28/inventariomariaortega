<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'nombre',
        'cantidad',
        'precio',
        'descripcion',
        'preciocompra',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
