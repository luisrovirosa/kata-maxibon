<?php

namespace LuisRovirosa\KataMaxibon;

class ConsoleChat implements Chat
{
    public function sendMessage(string $message): void
    {
        echo $message;
    }
}