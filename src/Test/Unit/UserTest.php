<?php

require __DIR__ . "/../../Entity/User.php";

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testGenreCompatibility_With8And6_Returns7()
    {
        $rating1 = $this->getMock('Rating', ['getScore']);
        $rating1->method('getScore')
                ->willReturn(6);

        $rating2 = $this->getMock('Rating', ['getScore']);
        $rating2->method('getScore')
                ->willReturn(8);

        $user = $this->getMock('User', ['findRatingsByGenre']);
        $user->method('findRatingsByGenre')
             ->willReturn([$rating1, $rating2]);
        $this->assertEquals(7, $user->getGenreCompatibility('zombies'));
    }

    public function testRatingsByGenre_With1ZombieAnd1Shooter_Returns1Zombie()
    {
        $zombiesGame = $this->getMock('Game', ['getGenreCode']);
        $zombiesGame->method('getGenreCode')
                    ->willReturn('zombies');

        $shooterGame = $this->getMock('Game', ['getGenreCode']);
        $shooterGame->method('getGenreCode')
                    ->willReturn('shooter');

        $rating1 = $this->getMock('Rating', ['getGame']);
        $rating1->method('getGame')
                ->willReturn($zombiesGame);

        $rating2 = $this->getMock('Rating', ['getGame']);
        $rating2->method('getGame')
                ->willReturn($shooterGame);

        $user = $this->getMock('User', ['getRatings']);
        $user->method('getRatings')
             ->willReturn([$rating1, $rating2]);


        $ratings = $user->findRatingsByGenre('zombies');
        $this->assertCount(1, $ratings);
        foreach ($ratings as $rating) {
            $this->assertEquals('zombies', $rating->getGame()->getGenreCode());
        }
    }
}
