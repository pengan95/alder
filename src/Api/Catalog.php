<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;
use InCommAlder\Exceptions\AlderResponseException;

/**
 * @property integer $id
 * @property integer $programId
 * @property string $name
 * @property \InCommAlder\Api\CatalogProduct[] $products
*/
class Catalog extends ResourceModel
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
     * @return int
     */
    public function getProgramId()
    {
        return $this->programId;
    }

    /**
     * @param int $programId
     * @return $this
     */
    public function setProgramId($programId)
    {
        $this->programId = $programId;
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
     * @return \InCommAlder\Api\CatalogProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param \InCommAlder\Api\CatalogProduct[] $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function get($apiContext)
    {
        $response = self::executeCall(
            'programs/programs/' . $this->getProgramId() . '/catalogs/' . $this->getId(),
            'GET',
            $apiContext,
            '',
            [],
            self::ENDPOINT_TYPE
        );
        if ($response->getStatusCode() == 200) {
            return $this->fromJson($response->getBody());
        } else {
            throw new AlderResponseException(
                "get catalog[" . $this->getId() . "] from program[" . $this->getProgramId() . "] failed, reason " . $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }
}