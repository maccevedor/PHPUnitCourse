<?php

namespace App\ShoppingCart;


class CartIsEmptyException extends \Exception

{
    public function errorMessage(){
        return "Error it was no found ";
    }
}