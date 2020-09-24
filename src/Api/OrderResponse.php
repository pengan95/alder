<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @property string $OrderUri
 * @property string $CreatedOn
 * @property string $OrderStatus
 * @property string $Message
 * @property string $PurchaseOrderNumber
 * @property integer $ProgramId
 * @property integer $CatalogId
 * @property string $Metadata
 * @property float $TotalFaceValue  Face value of all cards within order (i.e, gross amount of order)
 * @property float $TotalFees Total fees accumulated in order
 * @property float $TotalDiscounts Total discounts applied to order
 * @property float $TotalCustomerCost Total cost of order for customer (i.e., net cost of order)
 * @property string $CustomerOrderId
 * @property string $EmailTheme
 * @property \InCommAlder\Api\Recipient[] $Recipients
 *
 * @method OrderResponse get($order_uri)
 * @method \InCommAlder\Api\Card[] listCards($order_uri)
*/
class OrderResponse extends ResourceModel
{
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
    public function getCreatedOn()
    {
        return $this->CreatedOn;
    }

    /**
     * @param string $CreatedOn
     * @return $this
     */
    public function setCreatedOn($CreatedOn)
    {
        $this->CreatedOn = $CreatedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->OrderStatus;
    }

    /**
     * @param string $OrderStatus
     * @return $this
     */
    public function setOrderStatus($OrderStatus)
    {
        $this->OrderStatus = $OrderStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * @param string $Message
     * @return $this
     */
    public function setMessage($Message)
    {
        $this->Message = $Message;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->PurchaseOrderNumber;
    }

    /**
     * @param string $PurchaseOrderNumber
     * @return $this
     */
    public function setPurchaseOrderNumber($PurchaseOrderNumber)
    {
        $this->PurchaseOrderNumber = $PurchaseOrderNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getProgramId()
    {
        return $this->ProgramId;
    }

    /**
     * @param int $ProgramId
     * @return $this
     */
    public function setProgramId($ProgramId)
    {
        $this->ProgramId = $ProgramId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCatalogId()
    {
        return $this->CatalogId;
    }

    /**
     * @param int $CatalogId
     * @return $this
     */
    public function setCatalogId($CatalogId)
    {
        $this->CatalogId = $CatalogId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->Metadata;
    }

    /**
     * @param string $Metadata
     * @return $this
     */
    public function setMetadata($Metadata)
    {
        $this->Metadata = $Metadata;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalFaceValue()
    {
        return $this->TotalFaceValue;
    }

    /**
     * @param float $TotalFaceValue
     * @return $this
     */
    public function setTotalFaceValue($TotalFaceValue)
    {
        $this->TotalFaceValue = $TotalFaceValue;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalFees()
    {
        return $this->TotalFees;
    }

    /**
     * @param float $TotalFees
     * @return $this
     */
    public function setTotalFees($TotalFees)
    {
        $this->TotalFees = $TotalFees;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalDiscounts()
    {
        return $this->TotalDiscounts;
    }

    /**
     * @param float $TotalDiscounts
     * @return $this
     */
    public function setTotalDiscounts($TotalDiscounts)
    {
        $this->TotalDiscounts = $TotalDiscounts;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCustomerCost()
    {
        return $this->TotalCustomerCost;
    }

    /**
     * @param float $TotalCustomerCost
     * @return $this
     */
    public function setTotalCustomerCost($TotalCustomerCost)
    {
        $this->TotalCustomerCost = $TotalCustomerCost;
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
    public function getEmailTheme()
    {
        return $this->EmailTheme;
    }

    /**
     * @param string $EmailTheme
     * @return $this
     */
    public function setEmailTheme($EmailTheme)
    {
        $this->EmailTheme = $EmailTheme;
        return $this;
    }

    /**
     * @return \InCommAlder\Api\Recipient[]
     */
    public function getRecipients()
    {
        return $this->Recipients;
    }

    /**
     * @param \InCommAlder\Api\Recipient[] $Recipients
     * @return $this
     */
    public function setRecipients($Recipients)
    {
        $this->Recipients = $Recipients;
        return $this;
    }
    
}