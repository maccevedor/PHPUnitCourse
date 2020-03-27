<?php

function createItem($name, $amount)

{
    return new \App\ShoppingCart\CartItem($name, $amount);
}