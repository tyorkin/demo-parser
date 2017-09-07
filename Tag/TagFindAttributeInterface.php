<?php

namespace Tyorkin\DemoParser\Tag;


interface TagFindAttributeInterface
{
    /**
     * @param string $attributeName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValue(string $attributeName, string $pageContent): array;

}