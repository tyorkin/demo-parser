<?php

namespace Tyorkin\DemoParser\Tag;


interface TagInterface
{

    /**
     * @param string $pageContent
     * @return string
     */
    public function findFirst(string $pageContent): string;

    /**
     * @param string $pageContent
     * @return array
     */
    public function findAll(string $pageContent): array;
}