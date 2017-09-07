<?php

namespace Tyorkin\DemoParser\Tag;

abstract class Tag implements TagInterface
{
    /**
     * @param string $pageContent
     * @return string
     */
    public function findFirst(string $pageContent): string
    {
        $pattern = $this->getFindTagPattern();
        $tagContent = $this->findFirstByPattern($pattern, $pageContent);

        return $tagContent;
    }

    /**
     * @return string
     */
    abstract protected function getFindTagPattern(): string;

    /**
     * @param string $pattern
     * @param string $pageContent
     * @return string
     */
    protected function findFirstByPattern(string $pattern, string $pageContent): string
    {
        $text = '';
        preg_match($pattern, $pageContent, $matches);
        if (is_array($matches) && isset($matches[1])) {
            $text = $matches[1];
        }

        return $text;
    }

    /**
     * @param string $pageContent
     * @return array
     */
    public function findAll(string $pageContent): array
    {
        $pattern = $this->getFindTagPattern();
        $tagContentArray = $this->findAllByPattern($pattern, $pageContent);

        return $tagContentArray;
    }

    /**
     * @param string $pattern
     * @param string $pageContent
     * @return array
     */
    protected function findAllByPattern(string $pattern, string $pageContent): array
    {
        $array = [];
        preg_match_all($pattern, $pageContent, $matches);
        if (is_array($matches) && isset($matches[1])) {
            $array = $matches[1];
        }

        return $array;
    }
}