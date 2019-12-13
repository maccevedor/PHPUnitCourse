<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new App\Article;

    }

    public function testTitleIsEmptyByDefault()
    {

        $this->assertEmpty($this->article->title);
    }

    public function testSlugEmptyWithNoTitle()
    {

        //$this->assertEmpty($this->article->getSlug(),"");
        $this->assertSame($this->article->getSlug(),"");

    }

    public function testSlugHasSpaceReplaceByUnderscores(){

        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");

    }
}
