<?php

namespace App\Services\SMS;

use App\Services\SMS\Interface\SMSServiceInterface;
use Illuminate\Support\Facades\Http;

class ThirdSMSProvider implements SMSServiceInterface
{

    public function send($phone_number, $message):array
    {
        $config = config('sms.providers.third');
        $response = Http::withBasicAuth($config['username'], $config['password'])
            ->post($config['url'], [
                'From' =>$config['receptor'],
                'To' => $phone_number,
                'Message' => $message,
            ]);
        return $response->json();
    }
}
