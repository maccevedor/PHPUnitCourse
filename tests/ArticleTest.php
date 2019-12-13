<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testTitleIsEmptyByDefault()
    {
        $article = new App\Article;

        $this->assertEmpty($article->title);
    }

    public function testSlugEmptyWithNoTitle()
    {
        $article = new App\Article;

        //$this->assertEmpty($article->getSlug(),"");
        $this->assertSame($article->getSlug(),"");

    }
}
