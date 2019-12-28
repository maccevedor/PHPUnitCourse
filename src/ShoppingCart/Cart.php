<?php

namespace App\ShoppingCart;


class Cart() 
{
	private $cart = [];
	public $id;

	public function __contruct()
	{
		$this->id = uniqid();
		$this->cart = $cart;
	}

	public function add(CartItem $item): void 
	{ 
		array_push($this->cart,$item);
		
		
	}
	public function addItems(array $item): void 
	{ 
		$this->cart = array_merge($this->cart,$items);
		
	}	

	public function getFirtsItem(): CartItem
	{
		return reset($this->cart);
	}

	public function count(): int
	{
		return count($this->cart);
	}
	
	public function isEmpty(): bool
	{
		return empty($this->cart);
	}
}
