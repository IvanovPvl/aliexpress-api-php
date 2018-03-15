<?php

namespace Aliexpress;

use exceptions\AliexpressException;
use GuzzleHttp\Client as HttpClient;

/**
 * Class Client
 * @package Aliexpress
 */
class Client
{
    private const DOMAIN          = "http://gw.api.alibaba.com/openapi/";
    private const API_VERSION     = 2;
    private const API_NAMESPACE   = "portals.open";
    private const PROTOCOL_FORMAT = "param2";

    /** @var HttpClient */
    private $httpClient;

    /** @var string */
    private $apiKey;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey     = $apiKey;
        $this->httpClient = new HttpClient(['base_uri' => self::DOMAIN]);
    }

    public function setHttpClient(HttpClient $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param array $params
     *
     * @return array
     *
     * @throws AliexpressException
     */
    public function listPromotionProduct(array $params): array
    {
        return $this->getResult($params, __METHOD__);
    }

    /**
     * @param array $params
     *
     * @return array
     *
     * @throws AliexpressException
     */
    public function getPromotionProductDetail(array $params): array
    {
        return $this->getResult($params, __METHOD__);
    }

    private function getResult(array $params, string $fullMethod): array
    {
        $query    = http_build_query($params);
        $uri      = $this->generateUri($fullMethod);
        $response = $this->httpClient->request('GET', "$uri?$query");

        $result = json_decode($response->getBody()->getContents(), true);

        // TODO: Throw concrete Exception based on errorCode
        if ($result['errorCode'] != AliexpressException::SUCCESS) {
            throw new \Exception();
        }

        return $result;
    }

    private function generateUri(string $fullMethod): string
    {
        $method = explode('::', $fullMethod)[1];

        return self::PROTOCOL_FORMAT . '/' .
            self::API_VERSION . '/' .
            self::API_NAMESPACE . '/api.' .
            $method . '/' .
            $this->apiKey;
    }
}