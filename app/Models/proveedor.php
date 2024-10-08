<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit',
        'gmail',
        'tel',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
