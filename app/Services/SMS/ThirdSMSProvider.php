<?php

namespace App\Services\SMS;

use App\Services\SMS\Interface\SMSServiceInterface;
use Illuminate\Support\Facades\Http;

class ThirdSMSProvider implements SMSServiceInterface
{

    public function send($phone_number, $message):array
    {
        $config = config('sms.providers.third');
        $response = Http::post($config['url'], [
            'api_key'       => $config['username'],
            'api_secret'    => $config['password'],
            'to'            => $phone_number,
            'from'          => $config['receptor'],
            'text'          => $message,
        ]);
        return $response->json();
    }
}
