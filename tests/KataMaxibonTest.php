<?php

namespace Tests\LuisRovirosa\KataMaxibon;

use Eris\Generator;
use Eris\TestTrait;
use PHPUnit\Framework\TestCase;

class KataMaxibonTest extends TestCase
{
    use TestTrait;

    // https://github.com/giorgiosironi/eris

    public function testNaturalNumbersMagnitude()
    {
        $this->forAll(
            Generator\choose(0, 1000)
        )
             ->then(function ($number) {
                 $this->assertTrue(
                     $number >= 0
                 );
             });
    }
}