<?php

namespace LuisRovirosa\KataMaxibon;

class KataMaxibon
{
    public function grabMaxibons(Developer $developer): int
    {
        $fridge = new Fridge();
        $chat = new ConsoleChat();
        $numberOfMaxibons = $fridge->grabMaxibons($developer->numberOfMaxibons());
        if ($fridge->remainingMaxibons() <= 2){
            $fridge->addMaxibons(10);
            $chat->sendMessage("Hi guys, I'm {$developer->name()} . We need more maxibons!");
        }
        return $numberOfMaxibons;
    }
}