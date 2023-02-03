<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const NAME_TABLE = 'productos';
    const ESTADO_VALIDO = ['con inventario', 'sin inventario'];
}
