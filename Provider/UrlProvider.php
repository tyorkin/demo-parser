<?php

namespace Tyorkin\DemoParser\Provider;

use Tyorkin\DemoParser\Exception\BadRequestException;

class UrlProvider implements UrlProviderInterface
{
    /**
     * @param string $domain
     * @param array $links
     * @return array
     */
    public function findOnlyDomainLinks(string $domain, array $links): array
    {
        $domain = $this->getDomainFromUrl($domain);
        $correctLinks = [];
        foreach ($links as $key => $link) {
            $link = trim($link);
            /* get rid of PHPSESSID, #linkname, &amp; and javascript: */
            $link = preg_replace(array('/([\?&]PHPSESSID=\w+)$/i', '/(#[^\/]*)$/i', '/&amp;/', '/^(javascript:.*)/i', '/^(tel:.*)/i', '/^(skype:.*)/i', '/^(viber:.*)/i'), array('', '', '&', ''), $link);

            
            if (!preg_match("/^http[s]?:\/\/[^\/]*/", $link) && preg_match('/^[\/]?[^\/]+/', $link)) {
                $baseUrl = $this->normalizeUrl($domain);
                $link = $this->relativeToAbsolute($baseUrl, $link);
            }

            // check if in the same (sub-)$domain
            if (preg_match("/^http[s]?:\/\/[^\/]*" . str_replace('.', '\.', $domain) . "/i", $link)) {
                //save the URL
                if (!in_array($link, $correctLinks)) {
                    $correctLinks[] = $link;
                }
            }

        }

        return $correctLinks;
    }

    /**
     * @param string $url
     * @return string
     */
    public function getDomainFromUrl(string $url): string
    {
        $normalizedUrl = $this->normalizeUrl($url);
        $domain = parse_url($normalizedUrl, PHP_URL_HOST);

        return $domain;
    }

    /**
     * @param string $url
     * @return string
     */
    public function     normalizeUrl(string $url): string
    {
        $normalizedUrl = ltrim($url, '/');
        // If scheme included, return
        if (preg_match('#^http(s)?://#', $normalizedUrl)) {
            return $normalizedUrl;

        }

        $schema = $this->checkHttps($normalizedUrl) ? 'https://' : 'http://';
        $normalizedUrl = $schema . $normalizedUrl;

        return $normalizedUrl;
    }

    /**
     * @param string $url
     * @return bool
     */
    private function checkHttps(string $url): bool
    {
        if (!function_exists('curl_version')) {

            $exceptionMessage = 'CURL not installed/enabled';
            $exceptionCode = BadRequestException::CRITICAL_ERROR;
            throw new BadRequestException($exceptionMessage, $exceptionCode);
        }
        $ch = curl_init('https://' . $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD');
        curl_setopt($ch, CURLOPT_NOBODY, true);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

        curl_exec($ch);

        $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($header === 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $baseUrl
     * @param $relativeUrl
     * @return string
     */
    private function relativeToAbsolute($baseUrl, $relativeUrl): string
    {
        if ($relativeUrl[0] == '/') {
            $relativeUrl = substr($relativeUrl, 1);
        }
        if (!$relativeUrl) {
            return $baseUrl;
        }

        if ($baseUrl[strlen($baseUrl) - 1] == '/') {
            $baseUrl = substr($baseUrl, 0, strlen($baseUrl) - 1);
        }

        $absoluteUrl = $baseUrl . '/' . $relativeUrl;

        return $absoluteUrl;
    }
}