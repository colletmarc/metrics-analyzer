<?php

namespace App\Services\Message;

class Message
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $content;

    public function __construct(string $type, string $content)
    {
        $this->setType($type);
        $this->content = $content;
    }

    /**
     * @throws UnexpectedMessageTypeException
     */
    protected function setType(string $type): void
    {
        if (! in_array($type, ['success', 'danger', 'info', 'warning'])) {
            throw new UnexpectedMessageTypeException($type);
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
