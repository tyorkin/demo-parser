<?php

namespace Tyorkin\DemoParser\Client;

final class ClientResult
{
    const STATUS_OK = 1;
    const STATUS_ERROR = 0;

    /** @var  int */
    private $status = 0;
    /** @var  string */
    private $error = '';
    /** @var  boolean */
    private $criticalError = false;
    /** @var  string */
    private $content = '';

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return ClientResult
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     *
     * @return ClientResult
     */
    public function setError(string $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return ClientResult
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCriticalError(): bool
    {
        return $this->criticalError;
    }

    /**
     * @param bool $criticalError
     *
     * @return ClientResult
     */
    public function setCriticalError(bool $criticalError)
    {
        $this->criticalError = $criticalError;

        return $this;
    }
}