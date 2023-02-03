<?php

namespace Tests\Feature;

use Tests\Feature\util\TestCaseApiDecorator;

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
}
