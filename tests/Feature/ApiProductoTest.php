<?php

namespace Tests\Feature;

use App\Models\Producto;
use App\Models\Categoria;
use Tests\Feature\util\TestCaseApiDecorator;
use PHPUnit\Framework\Attributes\DataProvider;

class ApiProductoTest extends TestCaseApiDecorator
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $ruta = route('producto.index');
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->get($ruta);

        $response->assertStatus(200);
    }

    public function test_agregando_un_producto()
    {
        $expected = Producto::count()+1;
        $data = [
            'sku' => 'palabra',
            'nombre' => 'palabra',
            'descripcion' => 'palabra',
            'precio' => 20,
            'cantidad' => 5,
            // 'categoria_id' => 'palabra', no hay categorias disponibles
            'calificacion' => 5,
        ];
        $ruta = route('producto.store');
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->post($ruta);
        $response->assertStatus(422);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->post($ruta, $data);

        $response->assertStatus(200);
        $actual = Producto::count();
        $this->assertEquals($expected, $actual);
    }

    public function test_actualizar_un_producto()
    {
        $categoria = Categoria::factory()->create();
        $data = [
            'sku' => 'palabra',
            'nombre' => 'palabra',
            'descripcion' => 'palabra',
            'precio' => 20,
            'cantidad' => 5,
            'categoria_id' => [
                $categoria->id,
            ],
            'calificacion' => 5,
        ];
        $producto = Producto::factory()->create();
        $expected = Producto::count();
        $ruta = route('producto.update', [$producto->id]);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->put($ruta);
        $response->assertStatus(422);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->put($ruta, $data);

        $response->assertStatus(204);
        $actual = Producto::count();
        $this->assertEquals($expected, $actual);
    }

    public function test_quitar_un_producto()
    {
        $producto = Producto::factory()->create();
        $expected = Producto::count() - 1; // despues sera eliminado
        $ruta = route('producto.destroy', [$producto->id]);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->delete($ruta);
        $response->assertStatus(204);
        $actual = Producto::count();
        $this->assertEquals($expected, $actual);
    }

    /**
     * no work
     */
    public function provider()
    {
        $producto = Producto::factory()->create();
        return [
            [route('producto.index')],
            [route('producto.show', [$producto->id])],
        ];
    }

    //#[DataProvider('provider')]
    public function test_los_demas()
    {
        $producto = Producto::factory()->create();
        $rutas = [
            route('producto.index'),
            route('producto.show', [$producto->id]),
        ];
        foreach($rutas as $ruta) {
            $response = $this
                ->withHeaders(self::CABECERAS)
                ->get($ruta);
            $response->assertStatus(200);
        }
    }

    public function test_actualizar_un_cantidad_producto()
    {
        $producto = Producto::factory()->create();
        $expected = $producto->cantidad + 1;
        $data = [
            "cantidad" => $expected,
        ];
        $ruta = route('producto.actualizarCantidad', [$producto->id]);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->put($ruta);
        $response->assertStatus(422);
        $response = $this
            ->withHeaders(self::CABECERAS)
            ->put($ruta, $data);

        $response->assertStatus(204);
        $actual = Producto::find($producto->id)->cantidad;
        $this->assertEquals($expected, $actual);
    }
}
