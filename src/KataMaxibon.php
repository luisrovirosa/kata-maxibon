<?php

namespace LuisRovirosa\KataMaxibon;

class KataMaxibon
{
    private $fridge;
    private $chat;

    public function __construct(Fridge $fridge, Chat $chat)
    {
        $this->fridge = $fridge;
        $this->chat = $chat;
    }

    public function grabMaxibons(Developer $developer): int
    {
        $numberOfMaxibons = $this->fridge->grabMaxibons($developer->numberOfMaxibons());
        if ($this->fridge->remainingMaxibons() <= 2){
            $this->fridge->addMaxibons(10);
            $this->chat->sendMessage("Hi guys, I'm {$developer->name()}. We need more maxibons!");
        }
        return $numberOfMaxibons;
    }
}