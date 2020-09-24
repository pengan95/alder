<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @property string $productName
 * @property string $brandName
 * @property string $productSku
 * @property boolean $isDigital
 * @property float $maxAmount
 * @property float $minAmount
 * @property string $description
 * @property string $modifiedOn
 * @property string $currencyCode
 * @property string $productType
 * @property array $categories
*/
class CatalogProduct extends ResourceModel
{
    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     * @return $this
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * @param string $productSku
     * @return $this
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDigital()
    {
        return $this->isDigital;
    }

    /**
     * @param bool $isDigital
     * @return $this
     */
    public function setIsDigital($isDigital)
    {
        $this->isDigital = $isDigital;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }

    /**
     * @param float $maxAmount
     * @return $this
     */
    public function setMaxAmount($maxAmount)
    {
        $this->maxAmount = $maxAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinAmount()
    {
        return $this->minAmount;
    }

    /**
     * @param float $minAmount
     * @return $this
     */
    public function setMinAmount($minAmount)
    {
        $this->minAmount = $minAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getModifiedOn()
    {
        return $this->modifiedOn;
    }

    /**
     * @param string $modifiedOn
     * @return $this
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     * @return $this
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return $this
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     * @return $this
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }
    
}