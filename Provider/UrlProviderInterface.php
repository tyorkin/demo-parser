<?php

namespace Tyorkin\DemoParser\Provider;


interface UrlProviderInterface
{
    /**
     * @param string $domain
     * @param array $links
     * @return array
     */
    public function findOnlyDomainLinks(string $domain, array $links): array;

    /**
     * @param string $url
     * @return string
     */
    public function getDomainFromUrl(string $url): string;

    /**
     * @param string $url
     * @return string
     */
    public function normalizeUrl(string $url): string;


}