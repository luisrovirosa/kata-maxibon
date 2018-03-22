<?php

namespace Tests\LuisRovirosa\KataMaxibon;

use Eris\Generator;
use Eris\TestTrait;
use LuisRovirosa\KataMaxibon\Developer;
use LuisRovirosa\KataMaxibon\Fridge;
use LuisRovirosa\KataMaxibon\KataMaxibon;
use PHPUnit\Framework\TestCase;

class KataMaxibonTest extends TestCase
{
    use TestTrait;

    // https://github.com/giorgiosironi/eris

    /**
     * @test
     */
    public function the_number_of_maxibons_can_never_be_lower_than_3()
    {
        $this->forAll(
            Generator\names(),
            Generator\choose(0, 15)
        )
             ->then(function ($name, $numberOfMaxibons) {
                 $fridge = new Fridge();
                 $chat = new DummyChat();
                 $kataMaxibon = new KataMaxibon($fridge, $chat);
                 $developer = new Developer($name, $numberOfMaxibons);

                 $kataMaxibon->grabMaxibons($developer);

                 $this->assertGreaterThan(2, $fridge->remainingMaxibons());
             });
    }
}