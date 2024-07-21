<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Services\SMS\SMSManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderPlacedSms
{

    protected SMSManager $smsManager;
    /**
     * Create the event listener.
     */
    public function __construct(SMSManager $smsManager)
    {
        $this->smsManager = $smsManager;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        $customer   = $event->order->customer;
        $to         = $customer;
        $message    = "Dear '{$customer->name}',
                        Your order has been registered successfully.
                        Thank you.";
        // Send SMS using the default provider
        $this->smsManager->send($to, $message);
    }
}
