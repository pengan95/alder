<?php


namespace InCommAlder\Api;


use InCommAlder\Common\ResourceModel;

/**
 * @package InCommAlder\Api
 *
 *
 * @property string $PurchaseOrderNumber
 * @property integer $CatalogId
 * @property string $Metadata
 * @property string $CustomerOrderId
 * @property string $EmailTheme
 * @property \InCommAlder\Api\Recipient[] $Recipients
 */
class OrderRequest extends ResourceModel
{
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

    /**
     * Add Recipient to the list
     *
     * @param \InCommAlder\Api\Recipient $recipient
     * @return $this
     */
    public function addRecipient($recipient)
    {
        if (!$this->getRecipients()) {
            return $this->setRecipients([$recipient]);
        } else {
            return $this->setRecipients(
                array_merge($this->getRecipients(), [$recipient])
            );
        }
    }

    /**
     * Remove Recipient from the list.
     *
     * @param \InCommAlder\Api\Recipient $recipient
     * @return $this
     */
    public function removeRecipient($recipient)
    {
        return $this->setRecipients(
            array_diff($this->getRecipients(), [$recipient])
        );
    }


    /**
     * You must include a valid access token in the Authorization header
     * and a valid program ID in the ProgramId header of the POST request.
     *
     * A successful POST returns the Order URI in the Location header.
     * A standard order is limited to a total of 500 cards and 100 recipients.
    */
    public function create()
    {
        self::executeCall('/Orders','post','');
        $this->toJson();

        return $this->fromJson('', OrderResponse::class);
    }

    /**
     * You must include a valid access token in the Authorization header
     * and a valid program ID in the ProgramId header of the POST request.
     *
     * A successful POST returns order and card URIs in the response headers and body.
     * The Order URI is returned in the Location header.
     * Card URIs are returned in the Link header.
     * A link to all cards is listed first, followed by links to individual cards.
     * An immediate order is limited to a total of five digital cards and a single recipient.
    */
    public function createImmediate()
    {
        $recipients = $this->getRecipients();
    }
}