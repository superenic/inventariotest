<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = $this->faker->randomElement(Producto::ESTADO_VALIDO); 
        $cantidad = 0;
        if ($estado == Producto::ESTADO_VALIDO[0]) $cantidad = rand(2,50);
 
        return [
            'sku' => $this->faker->name(),
            'nombre' => $this->faker->name(),
            // 'categoria_id' => Categoria::select(['id'])->inRandomOrder()->first()->id,
            'descripcion' => $this->faker->name(),
            'precio' => rand(1,50),
            'cantidad' => $cantidad,
            'estado' => $estado,
            'calificacion' => rand(0,5),
        ];
    }
}
