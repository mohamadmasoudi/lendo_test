<?php

namespace App\Services\SMS;

use App\Services\SMS\Interface\SMSServiceInterface;
use InvalidArgumentException;

class SMSManager
{
    protected array $providers;

    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    public function provider(string $name): SMSServiceInterface
    {
        if (!isset($this->providers[$name])) {
            throw new InvalidArgumentException("Provider {$name} not found");
        }

        return $this->providers[$name];
    }

    public function send(string $to, string $message, string $providerName = null): array
    {
        $provider = $providerName ?: config('sms.default');
        return $this->provider($provider)->send($to, $message);
    }
}
