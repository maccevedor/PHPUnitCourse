<?php

class Game
{
    protected $title;
    protected $imagePath;
    protected $rating;

    // public function getAverageScore(){
    //     $ratings = $this->getRatings();
    //     $numRatings = count($ratings);

    //     if($numRatings == 0){
    //         return null;
    //     }

    //     $total = 0;
    //     foreach ($ratings as $rating){
    //         $total = $rating->getScore();
    //     }
    //     $valor = $total / $numRatings;
    //     echo 'valor'.$valor;
    //     return $total / $numRatings;
    // }

    public function getAverageScore()
    {
        $ratings = $this->getRatings();
        $numRatings = count($ratings);

        if ($numRatings == 0) {
            return null;
        }

        $total = 0;
        foreach ($ratings as $rating) {
            $score = $rating->getScore();
            if ($score === null) {
                $numRatings--;
                continue;
            }
            $total += $score;
        }
        return $total / $numRatings;
    }


    // public function isRecommended()
    // {
    //     return $this->getAverageScore() >= 3;
    // }
    public function isRecommended($user)
    {
        $compatibility = $user->getGenreCompatibility($this->getGenreCode());
        return $this->getAverageScore() / 10 * $compatibility >= 3;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getImagePath()
    {
        if ($this->imagePath == null) {
            return '/images/placeholder.jpg';
        }
        return $this->imagePath;
    }

    public function setImagePath($value)
    {
        $this->imagePath = $value;
    }

    public function getRatings()
    {
        return $this->ratings;
    }

    public function setRatings($value)
    {
        $this->ratings = $value;
    }
}
