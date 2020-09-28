<?php


namespace InCommAlder\Common;


class RestHandler
{
    /**
     * send request by guzzle
     *
     * @param string $url
     * @param string $method
     * @param array $headers
     * @param string $payload
     * @param array $options
     * @return \GuzzleHttp\Psr7\Response
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function call($method, $url, $payload, $headers, $options = []) {
        //TODO fill with some information like UserAgent, Timeout and so on
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request($method, $url, $headers, $payload);

        return $client->send($request, array_merge([
            'http_errors' => false,
            //'allow_redirects' => true, //允许重定向
        ],$options));
    }
}