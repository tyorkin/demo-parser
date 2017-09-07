<?php

namespace Tyorkin\DemoParser\Tag;


trait TagFindQuantityTrait
{
    /**
     * @param string $pageContent
     * @return int
     */
    public function countQuantity(string $pageContent): int
    {
        $tagsArray = $this->findAll($pageContent);
        $tagsCount = count($tagsArray);

        return $tagsCount;
    }
}