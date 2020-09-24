<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @property integer $id
 * @property integer $programId
 * @property string $name
 * @property \InCommAlder\Api\CatalogProduct[] $products
 *
 * @method Catalog get($program_id, $cate_id);
*/
class Catalog extends ResourceModel
{
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
    
}