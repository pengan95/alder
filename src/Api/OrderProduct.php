<?php


namespace InCommAlder\Api;


use InCommAlder\Common\ResourceModel;

/**
 * @package InCommAlder\Api
 *
 * @property string $Sku
 * @property float $Value
 * @property integer $Quantity
 * @property integer $EmbossedTextId
 * @property string $Packaging
 * @property string $MessageText
 * @property string $MessageRecipientName
 * @property string $MessageSenderName
 *
 */
class OrderProduct extends ResourceModel
{
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

    /**
     * @return int
     */
    public function getEmbossedTextId()
    {
        return $this->EmbossedTextId;
    }

    /**
     * @param int $EmbossedTextId
     * @return $this
     */
    public function setEmbossedTextId($EmbossedTextId)
    {
        $this->EmbossedTextId = $EmbossedTextId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackaging()
    {
        return $this->Packaging;
    }

    /**
     * @param string $Packaging
     * @return $this
     */
    public function setPackaging($Packaging)
    {
        $this->Packaging = $Packaging;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->MessageText;
    }

    /**
     * @param string $MessageText
     * @return $this
     */
    public function setMessageText($MessageText)
    {
        $this->MessageText = $MessageText;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageRecipientName()
    {
        return $this->MessageRecipientName;
    }

    /**
     * @param string $MessageRecipientName
     * @return $this
     */
    public function setMessageRecipientName($MessageRecipientName)
    {
        $this->MessageRecipientName = $MessageRecipientName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageSenderName()
    {
        return $this->MessageSenderName;
    }

    /**
     * @param string $MessageSenderName
     * @return $this
     */
    public function setMessageSenderName($MessageSenderName)
    {
        $this->MessageSenderName = $MessageSenderName;
        return $this;
    }
    
}