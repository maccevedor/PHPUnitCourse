<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new User('dave@example.com');

        $user->setMailerCallable(function() {

            echo "mocked";

            return true;

        });
    
        $this->assertTrue($user->notify('Hello!'));
    }
}
