<?php

require 'vendor/autoload.php';

function extractCompanyNames($input) {
  preg_match_all("/[A-Z]([A-Za-z\-’]+)(?:\s[A-Z])?/",$input,$matches);
  $matches = array_unique($matches[0]);
  return $matches;
}


use PHPUnit\Framework\TestCase;

class WorkExpConverterTest extends TestCase {

  public function testNewBrief() {
      $input = 'New brief
        False positives are allowed (but cool if there are none)
        Patterns that include groups of words that start with a capital letter.
        Names that are hyphenated eg T-Mobile / X-com
        Names that have of / and between eg Royal Bank of Scotland / Rhythm and Blues Entertainment
        Names that contain inverted comma eg McDonald’s / Sainsbury’s';
      $expected = ['T-Mobile', 'X-com', 'Royal Bank of Scotland', 'Rhythm and Blues Entertainment', 'McDonald’s', 'Sainsbury’s'];
      $actual = extractCompanyNames($input);
      $this->assertEquals($actual, $expected);
  }
}
