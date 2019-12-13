<?php

namespace App;

class Article
{
    public $title;

    public function getSlug(){

        //return "";

        $slug = $this->title;

        $slug = str_replace(' ','_', $slug);

        return $slug;

    }
}
