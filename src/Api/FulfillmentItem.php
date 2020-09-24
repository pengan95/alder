<?php


namespace InCommAlder\Api;

/**
 * @property string $FulfillmentStatus
 * @property string $OrderUri
 * @property string $CustomerOrderId
 * @property string $OrderDate
 * @property string $FulfilledDate
 * @property string $FulfillmentTrackingNumber
 * @property string $Sku
 * @property float $Value
 * @property integer $Quantity
 */

class FulfillmentItem extends \InCommAlder\Common\ResourceModel
{
    /**
     * @return string
     */
    public function getFulfillmentStatus()
    {
        return $this->FulfillmentStatus;
    }

    /**
     * @param string $FulfillmentStatus
     * @return $this
     */
    public function setFulfillmentStatus($FulfillmentStatus)
    {
        $this->FulfillmentStatus = $FulfillmentStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderUri()
    {
        return $this->OrderUri;
    }

    /**
     * @param string $OrderUri
     * @return $this
     */
    public function setOrderUri($OrderUri)
    {
        $this->OrderUri = $OrderUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerOrderId()
    {
        return $this->CustomerOrderId;
    }

    /**
     * @param string $CustomerOrderId
     * @return $this
     */
    public function setCustomerOrderId($CustomerOrderId)
    {
        $this->CustomerOrderId = $CustomerOrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->OrderDate;
    }

    /**
     * @param string $OrderDate
     * @return $this
     */
    public function setOrderDate($OrderDate)
    {
        $this->OrderDate = $OrderDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getFulfilledDate()
    {
        return $this->FulfilledDate;
    }

    /**
     * @param string $FulfilledDate
     * @return $this
     */
    public function setFulfilledDate($FulfilledDate)
    {
        $this->FulfilledDate = $FulfilledDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getFulfillmentTrackingNumber()
    {
        return $this->FulfillmentTrackingNumber;
    }

    /**
     * @param string $FulfillmentTrackingNumber
     * @return $this
     */
    public function setFulfillmentTrackingNumber($FulfillmentTrackingNumber)
    {
        $this->FulfillmentTrackingNumber = $FulfillmentTrackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->Sku;
    }

    /**
     * @param string $Sku
     * @return $this
     */
    public function setSku($Sku)
    {
        $this->Sku = $Sku;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * @param float $Value
     * @return $this
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * @param int $Quantity
     * @return $this
     */
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
        return $this;
    }

}