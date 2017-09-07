<?php

namespace Tyorkin\DemoParser\Tag;


class TagTitle extends Tag implements TagTextLengthCalculatedInterface
{
    use TagFindTextTrait;

    const FIND_TAG_PATTERN = '/(<title\s*>.+<\/title>)/simU';
    const FIND_TEXT_IN_TAG_PATTERN = '/<title\s*>(.+)<\/title>/simU';


    /**
     * @return string
     */
    protected function getFindTextInTagPattern(): string
    {
        return self::FIND_TEXT_IN_TAG_PATTERN;
    }

    /**
     * @return string
     */
    protected function getFindTagPattern(): string
    {
        return self::FIND_TAG_PATTERN;
    }
}