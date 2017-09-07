<?php

namespace Tyorkin\DemoParser\Provider;


interface SitemapProviderInterface
{
    /**
     * @param string $siteMapContent
     * @return array
     */
    public function getUrlListFromSitemap(string $siteMapContent): array;

    /**
     * @param string $siteMapContent
     * @return array
     */
    public function getSitemapUrlListFromSitemap(string $siteMapContent): array;

    /**
     * @param string $robotsContent
     * @return array
     */
    public function getSitemapUrlListFromRobots(string $robotsContent): array;
}