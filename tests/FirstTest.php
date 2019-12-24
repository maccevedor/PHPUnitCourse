<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends  TestCase
{
    public function testSum(){
        $c = new Calculator();

        $this->assertInstanceOf(Calculator::class,$c);
    }
    public function testAsserts()
    {

        $this->assertClassHasAttribute('data', Calculator::class);
        $this->assertContains(1, [2, 3, 1]);
    }
}
