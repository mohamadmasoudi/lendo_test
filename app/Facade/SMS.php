<?php

namespace App\Facade;

use App\Services\SMS\SMSManager;
use Illuminate\Support\Facades\Facade;

class SMS extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SMSManager::class;
    }
}
