<?php

namespace Tests\Feature;

use App\Facade\SMS;
use App\Services\SMS\FirstSMSProvider;
use App\Services\SMS\SecondSMSProvider;
use App\Services\SMS\SMSManager;
use App\Services\SMS\ThirdSMSProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class SmsManagerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Mocking the services
        $this->firstService     = Mockery::mock(FirstSMSProvider::class);
        $this->secondService    = Mockery::mock(SecondSMSProvider::class);
        $this->thirdService     = Mockery::mock(ThirdSMSProvider::class);

        // Binding the mocks to the container
        $this->app->instance(FirstSMSProvider::class, $this->firstService);
        $this->app->instance(SecondSMSProvider::class, $this->secondService);
        $this->app->instance(ThirdSMSProvider::class, $this->thirdService);

        // Creating the SMSManager instance
        $this->smsManager = $this->app->make(SMSManager::class);
    }

    public function testFirstService()
    {
        $to = '+1234567890';
        $message = 'Test message';

        $this->firstService->shouldReceive('send')
            ->with($to, $message)
            ->once()
            ->andReturn(['status' => 'sent']);

        $result = $this->smsManager->send($to, $message, 'first');

        $this->assertEquals(['status' => 'sent'], $result);
    }
    public function testSecondService()
    {
        $to = '+1234567890';
        $message = 'Test message';

        $this->secondService->shouldReceive('send')
            ->with($to, $message)
            ->once()
            ->andReturn(['status' => 'sent']);

        $result = $this->smsManager->send($to, $message, 'second');

        $this->assertEquals(['status' => 'sent'], $result);
    }

    public function testThirdService()
    {
        $to = '+1234567890';
        $message = 'Test message';

        $this->thirdService->shouldReceive('send')
            ->with($to, $message)
            ->once()
            ->andReturn(['status' => 'sent']);

        $result = $this->smsManager->send($to, $message, 'third');

        $this->assertEquals(['status' => 'sent'], $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

}
