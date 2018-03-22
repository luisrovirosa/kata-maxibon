<?php

namespace Tests\LuisRovirosa\KataMaxibon;

use LuisRovirosa\KataMaxibon\Chat;

class DummyChat implements Chat
{
    public function sendMessage(string $message): void
    {
    }
}