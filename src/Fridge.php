<?php

namespace LuisRovirosa\KataMaxibon;

class Fridge
{
    /** @var int */
    private $numberOfRemainingMaxibons;

    public function grabMaxibons(int $numberOfMaxibos): int
    {
        $this->numberOfRemainingMaxibons -= $numberOfMaxibos;
        return $numberOfMaxibos;
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