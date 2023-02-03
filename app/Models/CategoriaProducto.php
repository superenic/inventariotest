<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    const NAME_TABLE = 'categoria_producto';
    protected $table = self::NAME_TABLE;
}
