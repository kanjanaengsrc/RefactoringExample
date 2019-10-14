<?php
namespace v2;
set_include_path("../");
require('prime_v1.php');
//require('prime_v2.php');
//require('prime_v3.php');
use PHPUnit\Framework\TestCase;

final class primeUnitTests extends TestCase {

    public function testDecPrime():void
    {
        $decPrime = array(2,3,5,7);
        $this->assertEquals(
            $decPrime,
            (new primeGenerator())->generatePrimes(10)
        );
    }
    public function testAtPositionOfPrime():void
    {
        $expected = 29;
        $result = (new primeGenerator())->generatePrimes(100);
        $this->assertEquals($expected,$result[9]);
    }
    public function testNull():void
    {
        $this->assertEquals(
            array(),
            (new primeGenerator())->generatePrimes(1)
        );
    }

    public function testMinimum():void
    {
        $minPrime = array();
        $this->assertEquals(
            $minPrime,
            (new primeGenerator())->generatePrimes(2)
        );
    }
}
//phpunit.cmd tests/primeUnitTests.php