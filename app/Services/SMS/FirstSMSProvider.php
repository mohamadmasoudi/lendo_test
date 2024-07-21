<?php

namespace App\Services\SMS;

use App\Services\SMS\Interface\SMSServiceInterface;
use Illuminate\Support\Facades\Http;

class FirstSMSProvider implements SMSServiceInterface
{

    public function send($phone_number, $message): array
    {
        $config = config('sms.providers.first');

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
