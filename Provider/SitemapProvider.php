<?php

namespace Tyorkin\DemoParser\Provider;

class SitemapProvider implements SitemapProviderInterface
{
    /**
     * @param string $siteMapContent
     * @return array
     */
    public function getUrlListFromSitemap(string $siteMapContent): array
    {
        $urlList = [];
        $siteMap = new \SimpleXMLElement($siteMapContent);
        foreach ($siteMap->url as $url) {
            $urlList[] = (string)$url->loc;
        }

        return $urlList;
    }

    /**
     * @param string $siteMapContent
     * @return array
     */
    public function getSitemapUrlListFromSitemap(string $siteMapContent): array
    {
        $sitemapList = [];
        $siteMap = new \SimpleXMLElement($siteMapContent);
        foreach ($siteMap->sitemap as $url) {
            $sitemapList[] = (string)$url->loc;
        }

        return $sitemapList;
    }

    /**
     * @param string $robotsContent
     * @return array
     */
    public function getSitemapUrlListFromRobots(string $robotsContent): array
    {
        $sitemapUrlList = [];
        $pattern = '/Sitemap: ([^\s]+)/';
        preg_match_all($pattern, $robotsContent, $match);
        foreach ($match[1] as $sitemap) {
            $sitemapUrlList[] = $sitemap;
        }
        return $sitemapUrlList;
    }
}