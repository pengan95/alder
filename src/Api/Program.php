<?php


namespace InCommAlder\Api;
use InCommAlder\Common\ApiContext;
use InCommAlder\Common\ResourceModel;
use InCommAlder\Exceptions\AlderResponseException;


/**
 * @property integer $id
 * @property string $name
 * @property Link[] $links
 *
 * @method listFulfillment()
 * @method listCatalogs()
 */
class Program extends ResourceModel
{

    const ENDPOINT_TYPE = 'app';
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \InCommAlder\Api\Link[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param \InCommAlder\Api\Link[] $links
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    public function balance($apiContext)
    {
        //later will be support

        $response = self::executeCall(
            'programs/programs/' . $this->getId() . '/programbalance',
            'GET',
            $apiContext,
            '',
            [],
            self::ENDPOINT_TYPE
        );


        if ($response->getStatusCode() == 201) {
            return new OrderResponse($response->getBody());
        } else {
            throw new AlderResponseException(
                "creat an immediate order failed, reason " . $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }

    /**
     * @param $apiContext ApiContext
     * @return ProgramCatalog[]
    */
    public function catalogs($apiContext)
    {
        $response = self::executeCall(
            'programs/programs/' . $this->getId() . '/catalogs',
            'GET',
            $apiContext,
            '',
            [],
            self::ENDPOINT_TYPE
        );
        if ($response->getStatusCode() == 200) {
            return (new ProgramCatalog())->getList($response->getBody());
        } else {
            throw new AlderResponseException(
                "creat an immediate order failed, reason " . $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }

    /**
     * @return Program[]
    */
    public function all($apiContext)
    {
        $headers = [
            'Accept' => '*/*'
        ];
        $response = self::executeCall(
            'programs/programs',
            'GET',
            $apiContext,
            '',
            $headers,
            self::ENDPOINT_TYPE
        );

        if ($response->getStatusCode() == 200) {
            return $this->getList($response->getBody());
        } else {
            throw new AlderResponseException(
                $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }
}