<?php


namespace InCommAlder\Api;


use InCommAlder\Common\ApiContext;
use InCommAlder\Common\ResourceModel;
use InCommAlder\Exceptions\AlderResponseException;

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
    const ENDPOINT_TYPE = 'api';
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
     * @param int $program_id
     * @param ApiContext $apiContext
     * You must include a valid access token in the Authorization header
     * and a valid program ID in the ProgramId header of the POST request.
     *
     * A successful POST returns the Order URI in the Location header.
     * A standard order is limited to a total of 500 cards and 100 recipients.
     * <b>recommend after 5-10 minutes to get submit result</b>
    */
    public function create($program_id, $apiContext)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'ProgramId' => $program_id
        ];

        $response = self::executeCall(
            'Orders',
            'POST',
            $apiContext,
            $this->toJson(),
            $headers
        );



        /**
         * 202 Accepted; get header order uri
         *
         * 400 Bad Request; body
         * 401 Unauthorized; upstream handle
         *
         * 403 Forbidden
         * 404 Not Found
         * 405 Method Not Allowed
         * 412 Precondition; Failed body
         *
         * 409 Conflict; get header order uri
         *
         * 500 Internal Server Error
         * 502 Bad Gateway
         * 503 Service Unavailable
         * 504 Gateway Timeout
        */
        if ($response->getStatusCode() == 202) {
            return new OrderResponse(['OrderUri' => self::getOrderUriFromUrl($response->getHeader('Location')[0])]);
        } elseif ($response->getStatusCode() == 409) {
            return new OrderResponse(['OrderUri' => self::getOrderUriFromUrl($response->getHeader('Location')[0])]);
        } else {
            throw new AlderResponseException(
                "creat an stander order failed, reason " . $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }

    /**
     * @param int $program_id
     * @param ApiContext $apiContext
     * You must include a valid access token in the Authorization header
     * and a valid program ID in the ProgramId header of the POST request.
     *
     * A successful POST returns order and card URIs in the response headers and body.
     * The Order URI is returned in the Location header.
     * Card URIs are returned in the Link header.
     * A link to all cards is listed first, followed by links to individual cards.
     * An immediate order is limited to a total of five digital cards and a single recipient.
    */
    public function createImmediate($program_id, $apiContext)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'ProgramId' => $program_id
        ];

        $response = self::executeCall(
            'Orders/Immediate',
            'POST',
            $apiContext,
            $this->toJson(),
            $headers
        );


        if ($response->getStatusCode() == 201) {
            return new OrderResponse($response->getBody());
        }  else {
            throw new AlderResponseException(
                "creat an immediate order failed, reason " . $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }

    /**
     * header
     * Location
     * https://api.giftango.com/orders/RSD-02-9T0
     * ProgramId
     * 6352
     * Date
     * Sun, 27 Sep 2020 02:38:22 GMT
     */
    public static function getOrderUriFromUrl($url)
    {
        $url_arr = explode('/',$url);
        return array_pop($url_arr);
    }

    public function valid()
    {
        //after
    }
}