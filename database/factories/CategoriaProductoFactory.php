<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producto_id = Producto::select(['id'])->doesnthave('categoriaProducto')->inRandomOrder()->first()->id;
        $categoria_id = Categoria::select(['id'])->doesnthave('categoriaProducto')->inRandomOrder()->first()->id;

        return [
            'producto_id' => $producto_id,
            'categoria_id' => $categoria_id,
        ];
    }
}
