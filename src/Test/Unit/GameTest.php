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
}
