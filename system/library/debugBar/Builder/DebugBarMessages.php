<?php

namespace debugBar\Builder;

trait DebugBarMessages
{
    /**
     * @var
     */
    public $messages;

    /**
     * @param $message
     * @param string $type
     * @return void
     */
    public function addMessage($message, string $type = 'message')
    {
        $this->messages[] = [
            'time' => date('Y-m-d G:i:s'),
            'type' => $type,
            'message' => $message
        ];
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}