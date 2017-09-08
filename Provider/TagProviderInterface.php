<?php

namespace Tyorkin\DemoParser\Provider;

interface TagProviderInterface
{
    /**
     * @param string $attributeName
     * @param string $tagName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValue(string $attributeName, string $tagName, string $pageContent): array;

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getFirstTagTextLength(string $tagName, string $pageContent): int;

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLength(string $tagName, string $pageContent): int;

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLengthWithoutSpaces(string $tagName, string $pageContent): int;

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getTagQuantity(string $tagName, string $pageContent): int;
}