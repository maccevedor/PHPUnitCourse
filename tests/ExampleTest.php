<?php

use PHPUnit\Framework\TestCase;
// use Mockery\Adapter\PhpUnit\MockeryTestCase;

class ExampleTest
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4, 2 + 2);
    }

    // public function tearDown(): void
    // {
    //     Mockery:close();
    // }
}
