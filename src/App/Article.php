<?php

namespace App;

class Article
{
    public $title;

    public function getSlug(){

        //return "";

        $slug = $this->title;

        //$slug = str_replace(' ','_', $slug);

        //$slug = preg_replace('/\s+/','_', $slug);

        $slug = preg_replace('/\s+/','_', $slug);

        $slug = trim($slug,"_");

        return $slug;

    }
}
