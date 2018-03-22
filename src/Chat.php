<?php

namespace LuisRovirosa\KataMaxibon;

interface Chat
{
    public function sendMessage(string $message): void;
}