<?php

namespace Tyorkin\DemoParser\Provider;

use Tyorkin\DemoParser\Exception\TagNotFoundException;
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
            $tagInitializer = new TagInitializer();
            /** @var TagFindAttributeInterface $tag */
            $tag = $tagInitializer->getTag($tagName, 'getAllTagAttributeValue');
            $attributeValueArray = $tag->getAllTagAttributeValue($attributeName, $pageContent);
        } catch (TagNotFoundException $e) {

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
            $tagInitializer = new TagInitializer();
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = $tagInitializer->getTag($tagName, 'getFirstTagTextLength');
            $count = $tag->getFirstTagTextLength($pageContent);
        } catch (TagNotFoundException $e) {
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
            $tagInitializer = new TagInitializer();
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = $tagInitializer->getTag($tagName, 'getAllTagTextLength');
            $count = $tag->getAllTagTextLength($pageContent);
        } catch (TagNotFoundException $e) {

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
            $tagInitializer = new TagInitializer();
            /** @var TagTextLengthCalculatedInterface $tag */
            $tag = $tagInitializer->getTag($tagName, 'getAllTagTextLengthWithoutSpaces');
            $count = $tag->getAllTagTextLengthWithoutSpaces($pageContent);
        } catch (TagNotFoundException $e) {
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
            $tagInitializer = new TagInitializer();
            /** @var TagQuantityCountableInterface $tag */
            $tag = $tagInitializer->getTag($tagName, 'countQuantity');
            $count = $tag->countQuantity($pageContent);
        } catch (TagNotFoundException $e) {
            $count = 0;
        }
        return $count;

    }
}