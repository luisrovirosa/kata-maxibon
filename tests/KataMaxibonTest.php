<?php

namespace Tests\LuisRovirosa\KataMaxibon;

use Eris\Generator;
use Eris\TestTrait;
use LuisRovirosa\KataMaxibon\Chat;
use LuisRovirosa\KataMaxibon\Developer;
use LuisRovirosa\KataMaxibon\Fridge;
use LuisRovirosa\KataMaxibon\KataMaxibon;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

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

    /**
     * @test
     */
    public function ten_maxibons_are_automatically_bought_when_there_are_less_than_three_maxibons()
    {
        $this->forAll(
            Generator\names(),
            Generator\choose(8, 10)
        )
             ->then(function ($name, $numberOfMaxibons) {
                 $fridge = new Fridge();
                 $chat = new DummyChat();
                 $kataMaxibon = new KataMaxibon($fridge, $chat);
                 $developer = new Developer($name, $numberOfMaxibons);

                 $kataMaxibon->grabMaxibons($developer);

                 $this->assertEquals(10 - $numberOfMaxibons + 10, $fridge->remainingMaxibons());
             });
    }

    /**
     * @test
     */
    public function a_message_is_sent_when_there_are_less_than_three_maxibons()
    {
        $this->forAll(
            Generator\names(),
            Generator\choose(8, 10)
        )
             ->then(function ($name, $numberOfMaxibons) {
                 $fridge = new Fridge();
                 $chatProphecy = $this->prophesize(Chat::class);
                 /** @var Chat $chat */
                 $chat = $chatProphecy->reveal();
                 $kataMaxibon = new KataMaxibon($fridge, $chat);
                 $developer = new Developer($name, $numberOfMaxibons);

                 $expectedMessage = "Hi guys, I'm " . $name . ". We need more maxibons!";
                 $chatProphecy->sendMessage($expectedMessage)->shouldBeCalled();

                 $kataMaxibon->grabMaxibons($developer);
             });
    }

    /**
     * @test
     */
    public function a_message_is_not_sent_when_there_are_more_than_two_maxibons()
    {
        $this->forAll(
            Generator\names(),
            Generator\choose(0, 7)
        )
             ->then(function ($name, $numberOfMaxibons) {
                 $fridge = new Fridge();
                 $chatProphecy = $this->prophesize(Chat::class);
                 /** @var Chat $chat */
                 $chat = $chatProphecy->reveal();
                 $kataMaxibon = new KataMaxibon($fridge, $chat);
                 $developer = new Developer($name, $numberOfMaxibons);

                 $chatProphecy->sendMessage(Argument::any())->shouldNotBeCalled();

                 $kataMaxibon->grabMaxibons($developer);
             });
    }
}