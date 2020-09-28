<?php


namespace InCommAlder\Common;


use InCommAlder\Api\AuthTokenCredential;


/**
 * @property AuthTokenCredential $credential
*/
class ApiContext
{
    const ENDPOINT_TYPE_APP = 'app';
    const ENDPOINT_TYPE_API = 'api';

    const API_ALDER_ENDPOINT = 'https://api.giftango.com/';
    const APP_ALDER_ENDPOINT = 'https://app.giftango.com/';

    private $client_id;
    private $client_secret;
    private $grant_type = 'client_credentials';

    private $credential = null;

    private $configs = [];

    public function __construct($client_id, $client_secret, $configs = [])
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->configs = $configs;
    }

    public function payload()
    {
        return http_build_query([
            'grant_type' => $this->grant_type,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        ]);
    }

    /**
     * @param RestHandler $handler
    */
    public function auth($handler)
    {
        $endpoint = $this->getEndpoint('api');
        $url = $endpoint . 'auth/token';

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => '*/*'
        ];
        $response = $handler->call('POST', $url, $this->payload(), $headers);

        $credential = new AuthTokenCredential();
        $credential->fromJson($response->getBody());
        $this->setCredential($credential);
    }

    public function getEndpoint($endpoint_type)
    {
        if ($endpoint_type == self::ENDPOINT_TYPE_APP) {
            return self::APP_ALDER_ENDPOINT;
        } elseif ($endpoint_type == self::ENDPOINT_TYPE_API) {
            return self::API_ALDER_ENDPOINT;
        } else {
            throw new \InvalidArgumentException('endpoint type ' . $endpoint_type . ' is not defined');
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getConfig($key)
    {
        if (isset($this->configs[$key])) {
            return $this->configs[$key];
        } else {
            return null;
        }
    }

    /**
     * @return mixed|AuthTokenCredential
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param AuthTokenCredential $credential
     * @return ApiContext
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
        return $this;
    }
}