<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @property string $access_token
 * @property string $token_type
 * @property integer $expires_in
 * @property integer $expired_at
 */
class AuthTokenCredential extends ResourceModel
{
    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     * @return \InCommAlder\Api\AuthTokenCredential
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     * @return \InCommAlder\Api\AuthTokenCredential
     */
    public function setTokenType($token_type)
    {
        $this->token_type = $token_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }

    /**
     * @param int $expires_in
     * @return \InCommAlder\Api\AuthTokenCredential
     */
    public function setExpiresIn($expires_in)
    {
        $this->expires_in = $expires_in;

        $this->expired_at = $expires_in + time();
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiredAt()
    {
        return $this->expired_at;
    }

    public function valid()
    {
        if (!$this->getAccessToken()) {
            return false;
        }
        // 1 minute forward set expired
        if ($this->getExpiredAt() < time() - 60) {
            return false;
        }
        return true;
    }
}