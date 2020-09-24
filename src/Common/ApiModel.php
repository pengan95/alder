<?php

namespace InCommAlder\Common;

use Psr\Http\Message\ResponseInterface;

trait ApiModel
{

    /**
     * @param string $path
     * @param string $method
     * @param array $payload
     * @param ApiContext $apiContext
     * @param string $endpoint_type
     * @param array $headers
     * @return ResponseInterface
     */
    public static function executeCall($path, $method, $payload, $apiContext, $endpoint_type = 'api', $headers = [], $handler = null)
    {
        if (!$handler) {
            $handler = new RestHandler();
        }

        $credential = $apiContext->getCredential();

        if (!($credential && $credential->valid())) {
            $apiContext->auth($handler);
            $credential = $apiContext->getCredential();
        }

        $headers = array_merge($headers,
            ['Authorization' => 'Bearer ' . $credential->getAccessToken()]
        );

        $endpoint = $apiContext->getEndpoint($endpoint_type);
        $url = $endpoint . $path;
        //Make the execution call
        return $handler->call($url, $method, $payload, $headers);
    }
}