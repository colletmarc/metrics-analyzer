<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Session\Store;
use App\Services\Message\Message;
use App\Services\Message\MessageService;

class MessageServiceTest extends TestCase
{
    /** @test */
    public function can_have_a_message()
    {
        $store = $this->mock(Store::class, function ($mock) {
            $mock->shouldReceive('flash');

            $mock->shouldReceive('get')
                ->with('message')
                ->andReturn(new Message('info', 'Hello !'));
        });

        $service = new MessageService($store);
        $service->set('info', 'Hello !');
        $message = $service->get();

        $this->assertInstanceOf(Message::class, $message);
        $this->assertEquals('info', $message->getType());
        $this->assertEquals('Hello !', $message->getContent());
    }

    /** @test */
    public function can_know_if_message_missing()
    {
        $store = $this->mock(Store::class, function ($mock) {
            $mock->shouldReceive('exists')
                ->with('message')
                ->andReturn(false);
        });

        $service = new MessageService($store);

        $this->assertFalse($service->hasOne());
    }

    /** @test */
    public function can_know_if_message_exists()
    {
        $store = $this->mock(Store::class, function ($mock) {
            $mock->shouldReceive('exists')
                ->with('message')
                ->andReturn(true);
        });

        $service = new MessageService($store);

        $this->assertTrue($service->hasOne());
    }
}
