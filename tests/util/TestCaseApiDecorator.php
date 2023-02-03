<?php

namespace Tests\Feature\util;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCaseApiDecorator extends TestCase {
    use RefreshDatabase;

    const CABECERAS = [
        'Accept' => 'application/json',
    ];
}
