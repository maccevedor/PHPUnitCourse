<?php

class RatingSubmissionTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://gamebook.dev');
        $this->setBrowser('chrome');
    }

    public function tearDown()
    {
        $this->stop();
    }

    public function testHomePage()
    {
        $this->url('/');
        $content = $this->byCssSelector('li span.title')->text();
        $this->assertEquals("Game 1", $content);
    }

    public function testSubmitRating()
    {
        $this->timeouts()->implicitWait(2000);
        $this->url('/');
        $this->byLinkText('Rate')->click();

        $form = $this->byTag('form');
        $form->byName('score')->value(5);
        $form->submit();

        $this->assertEquals('http://gamebook.dev', $this->getBrowserUrl());

        $image = $this->currentScreenshot();
        file_put_contents(__DIR__.'/screenshots/submit-rating.jpg', $image);
    }
}