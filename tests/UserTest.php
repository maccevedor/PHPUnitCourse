<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new User('dave@example.com');

        //$mailer = new Mailer;
        $mailer = $this->createMock(Mailer::class);

        $user->setMailer($mailer);

        $this->assertTrue($user->notify('Hello!'));
    }
}
