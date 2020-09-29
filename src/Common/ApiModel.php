<?php

namespace InCommAlder\Common;


use InCommAlder\Exceptions\AlderResponseException;

trait ApiModel
{

    /**
     * @param string $path
     * @param string $method
     * @param string $payload
     * @param ApiContext $apiContext
     * @param array $headers
     * @param string $endpoint_type
     * @param null $handler
     * @return \GuzzleHttp\Psr7\Response
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function executeCall($path, $method, $apiContext, $payload = '', $headers = [], $endpoint_type = 'api', $handler = null)
    {
        if (!$handler) {
            $handler = new RestHandler();
        }

        $headers = array_merge(
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . self::loadAccessToken($apiContext, $handler)
            ],
            $headers
        );

        $endpoint = $apiContext->getEndpoint($endpoint_type);
        $url = $endpoint . $path;

        //Make the execution call
        $response = $handler->call($method, $url, $payload, $headers);

        if ($response->getStatusCode() == 401) {
            $apiContext->auth($handler, true);
            $headers['Authorization'] = 'Bearer ' . self::loadAccessToken($apiContext, $handler);
            $response = $handler->call($method, $url, $payload, $headers);
        }

        //记录请求,响应日志
//        if ($apiContext->getConfig('log_path')) {
//            error_log('');
//        }
        //TODO throw some exception like 404, 500
        if ($response->getStatusCode() >= 400 && $response->getStatusCode() != 409) {
            if($response->getBody()->getContents()) {
                throw new AlderResponseException($response->getBody(),$response->getStatusCode());
            }
            throw new AlderResponseException($response->getReasonPhrase(),$response->getStatusCode());
        }

        return $response;
    }

    private static function loadAccessToken($apiContext, $handler = null)
    {
        $credential = $apiContext->getCredential();

        if (!($credential && $credential->valid())) {
            $apiContext->auth($handler);
            $credential = $apiContext->getCredential();
        }

        return $credential->getAccessToken();
    }
}