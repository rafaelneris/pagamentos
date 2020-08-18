<?php

namespace Tests\Http\Requests;

use Tests\TestCase;

class DefaultRequestTest extends TestCase
{
    public function testRules()
    {
        $classeConcreta = new RequestConcret();
        $resultado = $classeConcreta->rules();
        $this->assertEquals(['cpf' => 'required|string'], $resultado);
        $this->assertIsArray($resultado);
    }

    public function testMessages()
    {
        $classeConcreta = new RequestConcret();
        $resultado = $classeConcreta->messages();
        $this->assertEquals(['cpf.required' => 'CPF não informado'], $resultado);
        $this->assertIsArray($resultado);
    }
}
