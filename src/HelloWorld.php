<?php


namespace WaferExample;


use IdNet\Wafer\Payload;

class HelloWorld
{

    public function __invoke($name = 'World')
    {
        return Payload::create(['message' => "Hello {$name}!"]);
    }

}
