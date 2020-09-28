<?php


namespace InCommAlder\Api;


use InCommAlder\Exceptions\AlderResponseException;

/**
 * The GET /fulfillment/{status} endpoint
 * lets you retrieve a paged list of orders within the past 90 days by fulfillment status.
 * The endpoint only returns orders
 * that match the status and are associated with the program ID submitted in the request.
 * The fulfillment status options are as follows:
 *
 * @property integer $ProgramId
 * @property string $Status
 * @property integer $PageNo
 * @property integer $PageSize
*/
class Fulfillment extends \InCommAlder\Common\ResourceModel
{
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
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     * @return $this
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageNo()
    {
        return $this->PageNo;
    }

    /**
     * @param int $PageNo
     * @return $this
     */
    public function setPageNo($PageNo)
    {
        $this->PageNo = $PageNo;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->PageSize;
    }

    /**
     * @param int $PageSize
     * @return $this
     */
    public function setPageSize($PageSize)
    {
        $this->PageSize = $PageSize;
        return $this;
    }

    private $nextPage;
    private $prevPage;

    /**
     * @param mixed $nextPage
     * @return $this
     */
    public function setNextPage($nextPage)
    {
        $this->nextPage = $nextPage;
        return $this;
    }

    /**
     * @param mixed $prevPage
     * @return $this
     */
    public function setPrevPage($prevPage)
    {
        $this->prevPage = $prevPage;
        return $this;
    }

    public function reset()
    {
        $this->nextPage = '';
        $this->prePage = '';
        return $this;
    }

    public function buildQuery()
    {
        return http_build_query($this->toArray());
    }

    private function request($url, $apiContext)
    {
        $headers = [
            'Accept' => '0',
            'ProgramId' => $this->getProgramId()
        ];
        $response = self::executeCall(
            $url,
            'GET',
            $apiContext,
            '',
            $headers
        );
        if ($response->getStatusCode() == 200) {
            /**
             * header
             * first
             * https://api.giftango.com/Fulfillment/All?PageNo=1&PageSize=1
             * prev
             * https://api.giftango.com/Fulfillment/All?PageNo=1&PageSize=1
             * next
             * https://api.giftango.com/Fulfillment/All?PageNo=3&PageSize=1
             */
            $this->setPrevPage($response->getHeader('prev')[0]);
            $this->setNextPage($response->getHeader('next')[0]);
            return (new FulfillmentItem())->getList($response->getBody());
        } else {
            throw new AlderResponseException(
                $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
    }

    public function filter($apiContext)
    {
        return $this->request('fulfillment' . "?" . $this->buildQuery(),$apiContext);
    }

    //By default, a successful GET returns orders in batches of 100 items per page.
    //Links to a previous and next page are included in the response headers when applicable.
    public function prev($apiContext)
    {
        return $this->request($this->prevPage,$apiContext);
    }

    public function next($apiContext)
    {
        return $this->request($this->nextPage,$apiContext);
    }
}