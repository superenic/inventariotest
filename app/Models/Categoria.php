<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    const TABLE_NAME = 'categorias';
    protected $table = self::TABLE_NAME;

    public function categoriaProducto() {
        return $this->hasMany(CategoriaProducto::class, 'categoria_id');
    }
}
