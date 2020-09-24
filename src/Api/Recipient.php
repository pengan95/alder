<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @package InCommAlder\Api
 *
 * @property string $ShippingMethod
 * @property string $LanguageCultureCode
 * @property string $FirstName
 * @property string $LastName
 * @property string $EmailAddress
 * @property string $Address1
 * @property string $Address2
 * @property string $City
 * @property string $StateProvinceCode
 * @property string $PostalCode
 * @property string $CountryCode
 * @property boolean $DeliverEmail
 * @property \InCommAlder\Api\OrderProduct[] $Products
 */
class Recipient extends ResourceModel
{
    /**
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->ShippingMethod;
    }

    /**
     * @param string $ShippingMethod
     * @return $this
     */
    public function setShippingMethod($ShippingMethod)
    {
        $this->ShippingMethod = $ShippingMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCultureCode()
    {
        return $this->LanguageCultureCode;
    }

    /**
     * @param string $LanguageCultureCode
     * @return $this
     */
    public function setLanguageCultureCode($LanguageCultureCode)
    {
        $this->LanguageCultureCode = $LanguageCultureCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     * @return $this
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param string $LastName
     * @return $this
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    /**
     * @param string $EmailAddress
     * @return $this
     */
    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->Address1;
    }

    /**
     * @param string $Address1
     * @return $this
     */
    public function setAddress1($Address1)
    {
        $this->Address1 = $Address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->Address2;
    }

    /**
     * @param string $Address2
     * @return $this
     */
    public function setAddress2($Address2)
    {
        $this->Address2 = $Address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return $this
     */
    public function setCity($City)
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->StateProvinceCode;
    }

    /**
     * @param string $StateProvinceCode
     * @return $this
     */
    public function setStateProvinceCode($StateProvinceCode)
    {
        $this->StateProvinceCode = $StateProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * @param string $PostalCode
     * @return $this
     */
    public function setPostalCode($PostalCode)
    {
        $this->PostalCode = $PostalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     * @return $this
     */
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeliverEmail()
    {
        return $this->DeliverEmail;
    }

    /**
     * @param bool $DeliverEmail
     * @return $this
     */
    public function setDeliverEmail($DeliverEmail)
    {
        $this->DeliverEmail = $DeliverEmail;
        return $this;
    }

    /**
     * @return OrderProduct[]
     */
    public function getProducts()
    {
        return $this->Products;
    }

    /**
     * @param \InCommAlder\Api\OrderProduct[] $Products
     * @return $this
     */
    public function setProducts($Products)
    {
        $this->Products = $Products;
        return $this;
    }

    /**
     * Add Product to the list
     *
     * @param \InCommAlder\Api\OrderProduct $product
     * @return $this
     */
    public function addProduct($product)
    {
        if (!$this->getProducts()) {
            return $this->setProducts([$product]);
        } else {
            return $this->setProducts(
                array_merge($this->getProducts(), [$product])
            );
        }
    }

    /**
     * Remove Product from the list.
     *
     * @param \InCommAlder\Api\OrderProduct $product
     * @return $this
     */
    public function removeProduct($product)
    {
        return $this->setProducts(
            array_diff($this->getProducts(), [$product])
        );
    }
}