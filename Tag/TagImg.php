<?php

namespace Tyorkin\DemoParser\Tag;


class TagImg extends Tag implements TagQuantityCountableInterface
{
    const FIND_TAG_PATTERN = '/(<img[^>]+>)/simU';

    use TagFindQuantityTrait;

    /**
     * @return string
     */
    protected function getFindTagPattern(): string
    {
        return self::FIND_TAG_PATTERN;
    }

}