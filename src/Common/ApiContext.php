<?php


namespace InCommAlder\Common;


use InCommAlder\Api\AuthTokenCredential;


/**
 * @property AuthTokenCredential $credential
*/
class ApiContext
{
    const MODE_SANDBOX = 'sandbox';
    const MODE_PRODUCTION = 'production';

    const API_ALDER_ENDPOINT = 'https://api.giftango.com/';
    const APP_ALDER_ENDPOINT = 'https://app.giftango.com/';

    //TODO still not know
    const SANDBOX_API_ALDER_ENDPOINT = 'https://api.sandbox.giftango.com/';
    const SANDBOX_APP_ALDER_ENDPOINT = 'https://app.sandbox.giftango.com/';

    private $client_id;
    private $client_secret;
    private $grant_type = 'client_credentials';
    private $mode;

    private $credential = null;

    public function __construct($client_id, $client_secret, $mode = 'sandbox')
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->mode = $mode;
    }

    public function requestData()
    {
        return [
            'grant_type' => $this->grant_type,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        ];
    }

    public function getMode(){
        return $this->mode;
    }

    /**
     * @param RestHandler $handler
    */
    public function auth($handler)
    {
        $endpoint = $this->getEndpoint('api');
        $url = $endpoint . 'auth/token';

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $response = $handler->call($url, 'post', $this->requestData(), $headers);
        $credential = new AuthTokenCredential();
        $credential->fromJson($response->getBody());

        $this->setCredential($credential);
    }

    public function getEndpoint($endpoint_type)
    {
        if ($endpoint_type == 'app') {
            return ($this->mode == self::MODE_PRODUCTION)
                ? self::APP_ALDER_ENDPOINT
                : self::SANDBOX_APP_ALDER_ENDPOINT;
        } elseif ($endpoint_type == 'api') {
            return ($this->mode == self::MODE_PRODUCTION)
                ? self::API_ALDER_ENDPOINT
                : self::SANDBOX_API_ALDER_ENDPOINT;
        } else {
            throw new \InvalidArgumentException('endpoint type ' . $endpoint_type . ' is not defined');
        }
    }
    /**
     * @return mixed
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