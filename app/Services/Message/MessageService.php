<?php

namespace App\Services\Message;

use Illuminate\Session\Store;

class MessageService
{
    /**
     * @var \Illuminate\Session\Store
     */
    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function set($type, $content): void
    {
        $this->session->flash('message', new Message($type, $content));
    }

    public function hasOne(): bool
    {
        return $this->session->exists('message');
    }

    public function get(): Message
    {
        return $this->session->get('message');
    }
}
