<?php

require __DIR__ . "/../Entity/Game.php";
require __DIR__ . "/../Entity/Rating.php";

class GameRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=gamebook_test',
            'root',
            null);
    }

    public function findById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM game WHERE id = ?');
        $statement->execute([$id]);
        $game = $statement->fetchObject('Game');
        return $game;
    }

    public function saveGameRating($gameId, $userId, $score)
    {
        $statement = $this->pdo->prepare(
            'REPLACE INTO rating (game_id, user_id, score)
           VALUES(?, ?, ?)');
        return $statement->execute([$gameId, $userId, $score]);
    }

    public function findByUserId($id)
    {
        $games = [];
        for ($i=1; $i <= 6; $i++) {
            $game = new Game();
            $game->setTitle("Game " . $i);
            $game->setImagePath("/images/game.jpg");
            $rating = new Rating();
            $rating->setScore(4.5);
            $game->setRatings([$rating]]);
            $games[] = $game;
        }
        return $games;
    }
}