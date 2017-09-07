<?php

namespace Tyorkin\DemoParser\Client;

use Tyorkin\DemoParser\Exception\BadRequestException;

class SimpleClient implements ClientInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function fetch(string $url): string
    {
        $html = '';
        if (!function_exists('curl_version')) {

            $exceptionMessage = 'CURL not installed/enabled';
            $exceptionCode = BadRequestException::CRITICAL_ERROR;
            throw new BadRequestException($exceptionMessage, $exceptionCode);
        }
        $curlRequest = curl_init();
        curl_setopt($curlRequest, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($curlRequest, CURLOPT_HEADER, false);
        curl_setopt($curlRequest, CURLOPT_URL, $url);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlRequest, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlRequest, CURLOPT_TIMEOUT, 15);
        curl_setopt($curlRequest, CURLOPT_FAILONERROR, true);
        $header[] = "Accept: text/html, text/*";
        curl_setopt($curlRequest, CURLOPT_HTTPHEADER, $header);
        $html = curl_exec($curlRequest);
        $httpStatus = curl_getinfo($curlRequest, CURLINFO_HTTP_CODE);
        $curlError = curl_error($curlRequest);
        $curlErrorNum = curl_errno($curlRequest);
        curl_close($curlRequest);
        if (!$html) {
            throw new BadRequestException($curlError, BadRequestException::NON_CRITICAL_ERROR);
        }
        if ($httpStatus !== 200) {
            $exceptionMessage = 'Error during receive response';
            $exceptionCode = BadRequestException::NON_CRITICAL_ERROR;
            throw new BadRequestException($exceptionMessage, $exceptionCode);
        }
        return $html;
    }
}