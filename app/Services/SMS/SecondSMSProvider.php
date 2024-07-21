<?php

namespace App\Services\SMS;

use App\Services\SMS\Interface\SMSServiceInterface;
use Illuminate\Support\Facades\Http;

class SecondSMSProvider implements SMSServiceInterface
{

    public function send($phone_number, $message):array
    {
        $config = config('sms.providers.second');
        $response = Http::withBasicAuth($config['username'], $config['password'])
            ->post($config['url'], [
                'From' =>$config['receptor'],
                'To' => $phone_number,
                'Message' => $message,
            ]);
        return $response->json();
    }
}
