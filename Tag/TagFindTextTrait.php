<?php

namespace Tyorkin\DemoParser\Tag;


trait TagFindTextTrait
{
    /**
     * @param string $pageContent
     * @return int
     */


    public function getAllTagTextLength(string $pageContent): int
    {
        $findTextInTagPattern = $this->getFindTextInTagPattern();
        $textArray = $this->getAllTextByPattern($findTextInTagPattern, $pageContent);
        $textLength = 0;
        foreach ($textArray as $text) {
            $textLength += strlen($text);
        }

        return $textLength;
    }

    /**
     * @param $pattern string
     * @param $pageContent string
     * @return array
     */
    protected function getAllTextByPattern(string $pattern, string $pageContent = ''): array
    {
        //echo $content; die;
        $textArray = [];
        preg_match_all($pattern, $pageContent, $matches);
        if (is_array($matches) && isset($matches[1])) {
            $textArray = $matches[1];
        }

        return $textArray;
    }

    /**
     * @param string $pageContent
     * @return int
     */
    public function getAllTagTextLengthWithoutSpaces(string $pageContent): int
    {
        $findTextInTagPattern = $this->getFindTextInTagPattern();
        $textArray = $this->getAllTextByPattern($findTextInTagPattern, $pageContent);
        $textLength = 0;
        foreach ($textArray as $text) {
            $textLength += strlen(preg_replace('/\s+/', '', $text));
        }

        return $textLength;
    }

    /**
     * @param string $pageContent
     * @return int
     */
    public function getFirstTagTextLength(string $pageContent): int
    {
        $tagContent = $this->findFirst($pageContent);
        $findTextInTagPattern = $this->getFindTextInTagPattern();
        $text = $this->getTextByPattern($findTextInTagPattern, $tagContent);
        $textLength = strlen($text);

        return $textLength;
    }

    /**
     * @param $pattern string
     * @param $tagContent string
     * @return string
     */
    protected function getTextByPattern(string $pattern, string $tagContent = ''): string
    {
        //echo $content; die;
        $text = '';
        preg_match($pattern, $tagContent, $matches);
        if (is_array($matches) && isset($matches[1])) {
            $text = $matches[1];
        }

        return $text;
    }
}