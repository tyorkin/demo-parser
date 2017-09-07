<?php

namespace Tyorkin\DemoParser\Tag;

class TagA extends Tag implements TagQuantityCountableInterface, TagFindAttributeInterface
{

    use TagFindQuantityTrait, TagFindAttributeValueTrait;

    const FIND_TAG_PATTERN = '/(<a\s.*>.*<\/a>)/simU';
    const TAG_NAME = 'a';

    /**
     * @return string
     */
    protected function getFindTagPattern(): string
    {
        return self::FIND_TAG_PATTERN;
    }

    /**
     * @param string $attributeName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValue(string $attributeName, string $pageContent): array
    {
        $attributesArray = $this->getAllTagAttributeValueByTagNme(self::TAG_NAME, $attributeName, $pageContent);

        return $attributesArray;
    }

}