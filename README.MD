composer dump-autoload
 phpunit --testSuite Unit

 vendor/phpunit/phpunit/phpunit --testdox-html docs/index.html

  vendor/phpunit/phpunit/phpunit src/Test/Unit/GameTest.php --filter testImage_WithNull_ReturnsPlaceholder