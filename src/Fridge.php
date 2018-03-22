<?php

namespace LuisRovirosa\KataMaxibon;

class Fridge
{
    /** @var int */
    private $numberOfRemainingMaxibons;

    public function __construct()
    {
        $this->numberOfRemainingMaxibons = 10;
    }

    public function grabMaxibons(int $numberOfMaxibons): int
    {
        $this->numberOfRemainingMaxibons -= $numberOfMaxibons;
        return $numberOfMaxibons;
    }

    public function addMaxibons(int $numberOfMaxibos): void
    {
        $this->numberOfRemainingMaxibons += $numberOfMaxibos;
    }

    public function remainingMaxibons(): int
    {
        return $this->numberOfRemainingMaxibons;
    }
}