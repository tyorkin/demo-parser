<?php

namespace Tyorkin\DemoParser\Tag;


class TagImg extends Tag implements TagQuantityCountableInterface
{
    const FIND_TAG_PATTERN = '/(<img[^>]+>)/simU';
    const TAG_NAME = 'img';
    use TagFindQuantityTrait;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::TAG_NAME;
    }

    /**
     * @return string
     */
    protected function getFindTagPattern(): string
    {
        return self::FIND_TAG_PATTERN;
    }

}