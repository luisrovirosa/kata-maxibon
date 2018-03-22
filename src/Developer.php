<?php

namespace LuisRovirosa\KataMaxibon;

class Developer
{
    /** @var int */
    private $numberOfMaxibons;
    /** @var string */
    private $name;

    public function __construct(string $name, int $numberOfMaxibons)
    {
        $this->numberOfMaxibons = $numberOfMaxibons;
        $this->name = $name;
    }

    public function numberOfMaxibons()
    {
        return $this->numberOfMaxibons;
    }

    public function name()
    {
        return $this->name;
    }
}