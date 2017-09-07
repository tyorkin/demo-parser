<?php

namespace Tyorkin\DemoParser\Exception;

class TagNotFoundException extends \RuntimeException
{
    public function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        if (!$message) {
            $message = 'Tag not found or wrong tag usage';
        }
        parent::__construct($message, $code, $previous);
    }
}