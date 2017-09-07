<?php

namespace Tyorkin\DemoParser\Tag;


use Tyorkin\DemoParser\Exception\TagNotFoundException;

abstract class TagInitializer
{
    const TAG_TEXT_LENGTH_CALCULATED_INTERFACE = 'TagTextLengthCalculatedInterface';
    const TAG_QUANTITY_COUNTABLE_INTERFACE = 'TagQuantityCountableInterface';
    const TAG_FIND_ATTRIBUTE_INTERFACE = 'TagFindAttributeInterface';

    /**
     * @param string $tagName
     * @return TagTextLengthCalculatedInterface
     */
    public static function initTagTextLengthCalculated(string $tagName): TagTextLengthCalculatedInterface
    {
        $fullClassName = self::getFullClassNameFromTagName($tagName);
        $implementedInterfaceFullName = self::getFullClassName(self::TAG_TEXT_LENGTH_CALCULATED_INTERFACE);
        if (!self::canInitiateClass($fullClassName, $implementedInterfaceFullName)) {
            throw new TagNotFoundException();
        }

        return new $fullClassName();
    }

    /**
     * @param string $tagName
     * @return string
     */
    private static function getFullClassNameFromTagName(string $tagName): string
    {
        $className = 'Tag' . ucfirst(strtolower($tagName));

        $fullClassName = self::getFullClassName($className);

        return $fullClassName;
    }

    private static function getFullClassName(string $className): string
    {
        $fullClassName = __NAMESPACE__ . '\\' . $className;

        return $fullClassName;
    }

    /**
     * @param string $className
     * @param string $implementedInterface
     * @return bool
     */
    private static function canInitiateClass(string $className, string $implementedInterface): bool
    {
        if (class_exists($className) && isset(class_implements($className)[$implementedInterface])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $tagName
     * @return TagFindAttributeInterface
     */
    public static function initTagAttributeValueFound(string $tagName): TagFindAttributeInterface
    {
        $fullClassName = self::getFullClassNameFromTagName($tagName);
        $implementedInterfaceFullName = self::getFullClassName(self::TAG_FIND_ATTRIBUTE_INTERFACE);
        if (!self::canInitiateClass($fullClassName, $implementedInterfaceFullName)) {
            throw new TagNotFoundException();
        }

        return new $fullClassName();
    }

    /**
     * @param string $tagName
     * @return TagQuantityCountableInterface
     */
    public static function initTagQuantityCountable(string $tagName): TagQuantityCountableInterface
    {
        $fullClassName = self::getFullClassNameFromTagName($tagName);
        $implementedInterfaceFullName = self::getFullClassName(self::TAG_QUANTITY_COUNTABLE_INTERFACE);
        if (!self::canInitiateClass($fullClassName, $implementedInterfaceFullName)) {
            throw new TagNotFoundException();
        }

        return new $fullClassName();
    }


}