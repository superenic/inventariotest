<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const NAME_TABLE = 'productos';
    const ESTADO_VALIDO = ['con inventario', 'sin inventario'];
    protected $table = self::NAME_TABLE;

    public function categorias() {
        return $this->belongsToMany(Categoria::class, 'categoria_producto', 'producto_id', 'categoria_id');
    }

    public function categoriaProducto() {
        return $this->hasMany(CategoriaProducto::class, 'producto_id');
    }
}
