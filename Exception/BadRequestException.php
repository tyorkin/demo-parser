<?php

namespace Tyorkin\DemoParser\Exception;

class BadRequestException extends \RuntimeException
{
    const CRITICAL_ERROR = 0;
    const NON_CRITICAL_ERROR = 1;

    public function __construct(string $message, int $code = 0, \Exception $previous = null)
    {
        $message = "$message";
        parent::__construct($message, $code, $previous);
    }
}