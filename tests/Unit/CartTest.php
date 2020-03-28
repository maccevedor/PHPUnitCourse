<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartItem;

class CartTest extends TestCase
{
   
    /**
     * This method is called before each test.
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        //echo "SetUp\n";
        $this->cart = new Cart();
    }

    public function testItCreatesACart()
    {
        //$item = new CartItem("Mouse", 20);
        $item = CreateItem("Mouse", 20);
        //$cart = new Cart();
        
        $this->assertEquals(0, $this->cart->count());
        $this->cart->add($item);
        $this->assertEquals(1,$this->cart->count());

    }

    public function testItAddsMultiplesItems()
    {
        $items = [];
        $cart = new Cart();
        $this->assertEquals(0, $cart->count());
        for($i = 1; $i <= 5; $i++){
        
            array_push($items, new CartItem("Mouse",20));
        }

        $cart->addItems($items);

        $this->assertEquals(count($items), $cart->count());
    }

    public function testItRemovesAnItem()
    {
        $item = new CartItem("Mouse", 20);
        $cart = new Cart();
        $cart->add($item);
        $this->assertEquals(1, $cart->count());

        $cart->remove($item->id);

        $this->assertTrue($cart->isEmpty());
    }

    public function testIsEmpty()
    {
        $cart = new Cart();

        $this->assertTrue($cart->isEmpty());
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown()/* The :void return type declaration that should be here would cause a BC issue */
    {
        //unset();
        //echo "tearDown\n";
    }

}
