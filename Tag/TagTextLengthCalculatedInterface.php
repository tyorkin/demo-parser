<?php

namespace Tyorkin\DemoParser\Tag;

interface TagTextLengthCalculatedInterface
{
    /**
     * @param string $pageContent
     * @return int
     */
    public function getFirstTagTextLength(string $pageContent): int;

    /**
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLength(string $pageContent): int;

    /**
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLengthWithoutSpaces(string $pageContent): int;
}