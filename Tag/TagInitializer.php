<?php

namespace Tyorkin\DemoParser\Tag;

use Tyorkin\DemoParser\Exception\TagNotFoundException;

class TagInitializer
{
    private $tags = [];

    public function __construct()
    {
        $this->tags[] = new TagA();
        $this->tags[] = new TagDescription();
        $this->tags[] = new TagH1();
        $this->tags[] = new TagImg();
        $this->tags[] = new TagP();
        $this->tags[] = new TagTitle();
    }

    public function getTag($tagName, $methodName): ?TagInterface
    {
        /** @var TagInterface $tag */
        foreach ($this->tags as $tag) {
            if ($tag->getName() == $tagName) {
                if (!method_exists($tag, $methodName)) {
                    throw new TagNotFoundException();
                }
                return $tag;
            }
        }

        throw new TagNotFoundException();
    }


}