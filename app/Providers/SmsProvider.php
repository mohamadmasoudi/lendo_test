<?php

namespace App\Providers;

use App\Services\SMS\FirstSMSProvider;
use App\Services\SMS\SecondSMSProvider;
use App\Services\SMS\ThirdSMSProvider;
use App\Services\SMS\SMSManager;
use Illuminate\Support\ServiceProvider;

class SmsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FirstSMSProvider::class,function ($app){
            return new FirstSMSProvider();
        });
        $this->app->bind(SecondSMSProvider::class,function ($app){
            return new SecondSMSProvider();
        });
        $this->app->bind(ThirdSMSProvider::class,function ($app){
            return new ThirdSMSProvider();
        });

        $this->app->singleton(SMSManager::class,function ($app){
            return new SMSManager([
                'first' => $app->make(FirstSMSProvider::class),
                'second' => $app->make(SecondSMSProvider::class),
                'third' => $app->make(ThirdSMSProvider::class),
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
