<?php

namespace Tyorkin\DemoParser\Provider;


use Tyorkin\DemoParser\Tag\TagFindAttributeInterface;
use Tyorkin\DemoParser\Tag\TagInitializer;
use Tyorkin\DemoParser\Tag\TagQuantityCountableInterface;
use Tyorkin\DemoParser\Tag\TagTextLengthCalculatedInterface;

class TagProvider implements TagProviderInterface
{

    /**
     * @param string $attributeName
     * @param string $tagName
     * @param string $pageContent
     * @return array
     */
    public function getAllTagAttributeValue(string $attributeName, string $tagName, string $pageContent): array
    {
        try {
            /** @var TagFindAttributeInterface $tag */
            $tag = TagInitializer::initTagAttributeValueFound($tagName);
            $attributeValueArray = $tag->getAllTagAttributeValue($attributeName, $pageContent);
        } catch (\Exception $e) {

            $attributeValueArray = [];
        }
        return $attributeValueArray;

    }


    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getFirstTagTextLength(string $tagName, string $pageContent): int
    {
        try {
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = TagInitializer::initTagTextLengthCalculated($tagName);
            $count = $tag->getFirstTagTextLength($pageContent);
        } catch (\Exception $e) {
            $count = 0;
        }
        return $count;

    }

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLength(string $tagName, string $pageContent): int
    {
        try {
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = TagInitializer::initTagTextLengthCalculated($tagName);
            $count = $tag->getAllTagTextLength($pageContent);
        } catch (\Exception $e) {

            $count = 0;
        }
        return $count;

    }

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLengthWithoutSpaces(string $tagName, string $pageContent): int
    {
        try {
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = TagInitializer::initTagTextLengthCalculated($tagName);
            $count = $tag->getAllTagTextLengthWithoutSpaces($pageContent);
        } catch (\Exception $e) {
            $count = 0;
        }
        return $count;

    }

    /**
     * @param string $tagName
     * @param string $pageContent
     * @return int
     */
    public function getTagQuantity(string $tagName, string $pageContent): int
    {
        try {
            /** @var  TagQuantityCountableInterface $tag */
            $tag = TagInitializer::initTagQuantityCountable($tagName);
            $count = $tag->countQuantity($pageContent);
        } catch (\Exception $e) {
            $count = 0;
        }
        return $count;

    }

}