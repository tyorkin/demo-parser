<?php

namespace Tyorkin\DemoParser\Tag;

class TagA extends Tag implements TagQuantityCountableInterface, TagFindAttributeInterface
{

    use TagFindQuantityTrait, TagFindAttributeValueTrait;

    const FIND_TAG_PATTERN = '/(<a\s.*>.*<\/a>)/simU';
    const TAG_NAME = 'a';

    /**
     * @param string $attributeName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValue(string $attributeName, string $pageContent): array
    {
        $attributesArray = $this->getAllTagAttributeValueByTagNme($this->TAG_NAME, $attributeName, $pageContent);

        return $attributesArray;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->TAG_NAME;
    }

    /**
     * @return string
     */
    protected function getFindTagPattern(): string
    {
        return $this->FIND_TAG_PATTERN;
    }

}