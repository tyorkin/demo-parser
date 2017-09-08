<?php

namespace Tyorkin\DemoParser\Exception;

class TagNotFoundException extends \RuntimeException
{
    /**
     * TagNotFoundException constructor.
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        if (!$message) {
            $message = 'Tag not found or wrong tag usage';
        }
        parent::__construct($message, $code, $previous);
    }
}