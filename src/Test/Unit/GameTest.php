<?php

require __DIR__ . "/../../Entity/Game.php";

use PHPUnit\Framework\TestCase;

//class GameTest extends PHPUnit_Framework_TestCase
class GameTest extends TestCase
{
    public function testImage_WithNull_ReturnsPlaceholder()
    {
        $game = new Game();
        $game->setImagePath(null);
        $this->assertEquals('/images/placeholder.jpg', $game->getImagePath());
    }

    public function testImage_WithPath_ReturnsPath()
    {
        $game = new Game();
        $game->setImagePath('/images/game.jpg');
        $this->assertEquals('/images/game.jpg', $game->getImagePath());
    }

    public function testIsRecommended_With5_ReturnsTrue()
    {
        //$game = $this->createMock(Game::class);
        $game = $this->getMockBuilder(Game::class);
        //$game = $this->getMockBuilder(Game::class, ['getAverageScore']);
        $game->setMethods(['getAverageScore'])
             //->willReturn(5);
                     
             
        //$game->setMethods(['getAverageScore','isRecommended'])
             ->getMock();

        $game->setMethods(['getAverageScore'])->return(TRUE);

        $games = new Game($game);
            
        $this->assertTrue($games->isRecommended());
    }

    public function testAverageScore_WithoutRatings_ReturnsNull(){
        
        $game = new Game();
        $game->setRating([]);
        $this->assertNull($game->getAverageScore());

    }

    public function testAverageScore_With6and8_Returns7(){

        $rating1 = $this->getMockBuilder(Game::class)
                         ->setMethods(['getScore'])
                         ->getMock();
          
        $rating1->method('getScore')
                ->willReturn(6);
        $rating2 = $this->getMockBuilder(Game::class)
                         ->setMethods(['getScore'])
                         ->getMock();
        $rating2->method('getScore')
                ->willReturn(8);

        $game = $this->getMockBuilder(Game::class)
                     ->getMock();  

                       
        $game->method('getRatings')
             ->willReturn([$rating1,$rating2]);
        
        //$this->assertEquals(null, $game->getAverageScore());
        $this->assertEquals(null, $game->getAverageScore());

    }
    public function testAverageScore_WithNullAnd5_Returns5(){

        $rating1 = $this->getMockBuilder(Game::class)
        ->setMethods(['getScore'])
        ->getMock();

        $rating1->method('getScore')
        ->willReturn(null);

        $rating2 = $this->getMockBuilder(Game::class)
                ->setMethods(['getScore'])
                ->getMock();
        $rating2->method('getScore')
        ->willReturn(5);

        $game = $this->getMockBuilder(Game::class)
            ->getMock();  

            
        $game->method('getRatings')
        ->willReturn([$rating1,$rating2]);

        //$this->assertEquals(null, $game->getAverageScore());
        $this->assertEquals(5, $game->getAverageScore());
    }


    public function testIsRecommended_WithCompatibility2AndScore10_ReturnsFalse()
    {
        // $game = $this->getMock('Game', ['getAverageScore', 'getGenreCode']);
        // $game->method('getAverageScore')
        //      ->willReturn(10);

             $game = $this->getMockBuilder(Game::class)
             ->setMethods(['getGenreCode','isRecommended'])
             ->getMock();
     $game->method('getGenreCode')
     ->willReturn(10);

        // $user = $this->getMock('User', ['getGenreCompatibility']);
        // $user->method('getGenreCompatibility')
        //      ->willReturn(2);
        $user = $this->getMockBuilder(User::class)
        //->methods(['getGenreCompatibility'])
        ->setMethods(['getGenreCompatibility'])
        ->getMock();
        $user->method('getGenreCompatibility')
        ->willReturn(2);


        $this->assertFalse($game->isRecommended($user));
    }

    public function testIsRecommended_WithCompatibility10AndScore10_ReturnsFalse()
    {
        $game = $this->getMock('Game', ['getAverageScore', 'getGenreCode']);
        $game->method('getAverageScore')
             ->willReturn(10);

        $user = $this->getMock('User', ['getGenreCompatibility']);
        $user->method('getGenreCompatibility')
             ->willReturn(10);

        $this->assertTrue($game->isRecommended($user));
    }
}