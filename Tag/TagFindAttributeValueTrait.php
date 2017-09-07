<?php

namespace Tyorkin\DemoParser\Tag;

trait TagFindAttributeValueTrait
{
    /**
     * @param string $tagName
     * @param string $attributeName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValueByTagName(string $tagName, string $attributeName, string $pageContent): array
    {
        $attributesArray = [];
        $regExp = '/<'.$tagName.'.*' . $attributeName . '\s*=\s*["\'](.*)["\'].*>/simU';
        preg_match_all($regExp, $pageContent, $matches);
        if (is_array($matches) && isset($matches[1])) {
            $attributesArray = $matches[1];
        }

        return $attributesArray;
    }
}