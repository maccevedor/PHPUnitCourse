<?php

/**
 * Item
 *
 * An example item class
 */
class Item
{

    /**
     * Get the description
     *
     * @return integer A random integer
     */
    public function getDescription()
    {
        return $this->getID() . $this->getToken();
    }

    /**
     * Get a random ID
     *
     * @return integer The ID
     */
    protected function getID()
    {
        return rand();
    }

    /**
     * Get a random token
     *
     * @return string The token
     */
    private function getToken()
    {
        return uniqid();
    }

    private function getPrefixedToken(string $prefix){
        return uniqid($prefix);
    }
}
