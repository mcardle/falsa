<?php

use Keystroke\Falsa\Exceptions\EntityNotFoundException;
use Keystroke\Falsa\Factories\Chain;
use PHPUnit\Framework\TestCase;

class ChainTest extends TestCase{

    /** @test */
    public function it_returns_an_instance_of_chain_on_init(){
        $chain = Chain::init();
        $this->assertInstanceOf(Chain::class, $chain);
    }

    /** @test */
    public function it_accepts_method_calls_to_classes_that_exists_and_return_itself(){
        $chain = Chain::init();
        $this->assertInstanceOf(Chain::class, $chain->category('phones'));
    }

    /** @test */
    public function it_throws_an_exception_when_a_class_does_not_exists(){
        $chain = Chain::init();

        $this->expectException(EntityNotFoundException::class);

        $chain->some_weird_class_name();
    }
}