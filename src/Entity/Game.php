<?php

class Game
{
    protected $title;
    protected $imagePath;
    protected $rating;

    public function isRecommended()
    {
        return $this->getAverageScore() >= 3;
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

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }
}
