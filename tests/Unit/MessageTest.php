<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Message\Message;
use App\Services\Message\UnexpectedMessageTypeException;

class MessageTest extends TestCase
{
    /** @test */
    public function can_have_info_message()
    {
        $message = new Message('info', 'Petite info du peuple.');

        $this->assertEquals('info', $message->getType());
        $this->assertEquals('Petite info du peuple.', $message->getContent());
    }

    /** @test */
    public function cant_have_unexpected_message_type()
    {
        $this->expectException(UnexpectedMessageTypeException::class);

        new Message('unexpected', 'Broken !');
    }
}
