<?php

require 'vendor/autoload.php';

function extractCompanyNames($input) {
  return ['T-Mobile'];
}


use PHPUnit\Framework\TestCase;

class WorkExpConverterTest extends TestCase {

  public function testStartDateYearEnDash() {
      $input = 'New brief
        False positives are allowed (but cool if there are none)
        Patterns that include groups of words that start with a capital letter.
        Names that are hyphenated eg T-Mobile / X-com
        Names that have of / and between eg Royal Bank of Scotland / Rhythm and Blues Entertainment
        Names that contain inverted comma eg McDonald’s / Sainsbury’s';
      $expected = ['T-Mobile', 'X-Com'];
      $actual = extractCompanyNames($input);
      $this->assertEquals($actual, $expected);
  }
}
