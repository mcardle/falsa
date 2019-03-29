<?php

use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase{

    /** @test */
	public function it_returns_a_category_string(){
		$category = new \Keystroke\Falsa\Entities\Category();
		$this->assertIsString($category->generate());
	}

}