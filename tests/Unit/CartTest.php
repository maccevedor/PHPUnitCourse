<?php

namespace Test\Unit;

use App\Connection;
use PHPUnit\Framework\TestCase;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartItem;
use App\ShoppingCart\CartIsEmptyException;
//use App\Connection;

use Test\TestBase;

class CartTest extends TestBase
{
   

    public static function setUpBeforeClass()
    {
        echo "Inicio \n";
    }

    public static function tearDownAfterClass()
    {
        echo "Fin \n";
    }


    /**
     * This method is called before each test.
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        //echo "SetUp\n";
        Parent::setUp();
        $this->cart = new Cart();
        $this->conn = new Connection();
        $this->conn->createSchema();
    }

    /**
     * @testdox Create Cart PHPUnit
     */
    public function testItCreatesACart()
    {
        $this->assertEquals('Fernando',$this->name);
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
        //$this->conn->dropTable();
    }


    public function testItStoresAnCart(){

        $this->conn->insert($this->cart);
        $cart = $this->conn->get($this->cart->id);
        $this->assertEquals($cart->id, $this->cart->id);
    }


    public function test_id_throws_an_empty_exception(){
        
        $this->expectException(CartIsEmptyException::class);
        $this->cart->getFirstItem();
    }

}
