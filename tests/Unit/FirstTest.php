<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use Calculator;

class FirstTest extends  TestCase
{
    protected function setUp()
    {
        
        // if(true) {
        //     $this->markTestSkipped(
        //         'this skipped'
        //     );

        //     $this->assertTrue(true);
        // }
    }
    public function testSum(){
        $c = new Calculator();

        $this->assertInstanceOf(Calculator::class,$c);
    }
    public function testAsserts()
    {

        $this->assertClassHasAttribute('data', Calculator::class);
        $this->assertContains(1, [2, 3, 1]);
    }
    public function testToComplete(){
        
        $this->markTestIncomplete();

    }

    //public function testSkipped(){
    //}
}
