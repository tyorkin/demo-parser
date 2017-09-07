<?php

namespace Tyorkin\DemoParser\Client;

interface ClientInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function fetch(string $url): string;
}