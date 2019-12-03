<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected static $queue;

    protected function setUp(): void
    {
        //$this->queue = new Queue;
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty()
    {
        // $queue = new Queue;

        $this->assertEquals(0, static::$queue->getCount());

    }

    public function testAnItemIsAddedToTheQueue()
    {

        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());

    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');

        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }


    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());

    }

    public function testMaxNumberOfItemsCanBeAdd(){

        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);

        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }
}
