<?php

namespace App\Services\SMS\Interface;

interface SMSServiceInterface
{
    public function send(string $phone_number,string $message): array;
}
