<?php


namespace InCommAlder\Common;

use GuzzleHttp\Client;
use http\Client\Request;

class RestHandler
{
    public function call($url, $method, $payload, $headers) {
        $client = new Client();
        $request = new Request($url, $method, $payload, $headers);
        return $client->send($request);
    }
}