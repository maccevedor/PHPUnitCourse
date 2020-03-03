<?php

namespace App\ShoppingCart;

class CartItem
{
	private $name,$amount;
	public $id;

	public function __construct($name,$amount)
	{
		$this->id = uniqid();
		$this->name = $name;
		$this->amount = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}
	public function getName()
	{
		return $this->name;
	}
}

