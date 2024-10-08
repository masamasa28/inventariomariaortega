<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'precio_compra',
        'valor_unidad',
        'soporte',
        'proveedor_id',
        'producto_id',
    ];

 // Definimos la relación con el modelo Proveedor
 public function proveedor()
 {
     return $this->belongsTo(Proveedor::class);
 }

 // Definimos la relación con el modelo Producto
 public function producto()
 {
     return $this->belongsTo(productos::class);
 }

 use SoftDeletes;

 protected $dates = ['deleted_at'];
 
}