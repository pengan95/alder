<?php


namespace InCommAlder\Api;

use InCommAlder\Common\ResourceModel;

/**
 * @package InCommAlder\Api
 *
 * @property string $CertificateLink
 * @property string $CardNumber
 * @property string $Pin
 * @property string $Auxiliary
 * @property string $BarcodeImageUrl
 * @property string $ImageUrl
 * @property string $TermsAndConditions
 * @property string $FormattedTermsAndConditions
 * @property string $MarketingDescription
 * @property string $FormattedMarketingDescription
 * @property string $LegalDisclaimer
 * @property string $FormattedLegalDisclaimer
 * @property string $ExpirationDate
 * @property float $InitialBalance
 * @property string $CardUri
 * @property string $Sku
 * @property string $CreatedOn
 * @property string $UsageInstructions
 * @property string $FormattedUsageInstructions
 *
 * TODO LIST
 * @method Card get()
 * @method string balance()
 * @method boolean void()
 */
class Card extends ResourceModel
{
    /**
     * @return string
     */
    public function getCertificateLink()
    {
        return $this->CertificateLink;
    }

    /**
     * @param string $CertificateLink
     * @return $this
     */
    public function setCertificateLink($CertificateLink)
    {
        $this->CertificateLink = $CertificateLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    /**
     * @param string $CardNumber
     * @return $this
     */
    public function setCardNumber($CardNumber)
    {
        $this->CardNumber = $CardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPin()
    {
        return $this->Pin;
    }

    /**
     * @param string $Pin
     * @return $this
     */
    public function setPin($Pin)
    {
        $this->Pin = $Pin;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuxiliary()
    {
        return $this->Auxiliary;
    }

    /**
     * @param string $Auxiliary
     * @return $this
     */
    public function setAuxiliary($Auxiliary)
    {
        $this->Auxiliary = $Auxiliary;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcodeImageUrl()
    {
        return $this->BarcodeImageUrl;
    }

    /**
     * @param string $BarcodeImageUrl
     * @return $this
     */
    public function setBarcodeImageUrl($BarcodeImageUrl)
    {
        $this->BarcodeImageUrl = $BarcodeImageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->ImageUrl;
    }

    /**
     * @param string $ImageUrl
     * @return $this
     */
    public function setImageUrl($ImageUrl)
    {
        $this->ImageUrl = $ImageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getTermsAndConditions()
    {
        return $this->TermsAndConditions;
    }

    /**
     * @param string $TermsAndConditions
     * @return $this
     */
    public function setTermsAndConditions($TermsAndConditions)
    {
        $this->TermsAndConditions = $TermsAndConditions;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedTermsAndConditions()
    {
        return $this->FormattedTermsAndConditions;
    }

    /**
     * @param string $FormattedTermsAndConditions
     * @return $this
     */
    public function setFormattedTermsAndConditions($FormattedTermsAndConditions)
    {
        $this->FormattedTermsAndConditions = $FormattedTermsAndConditions;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarketingDescription()
    {
        return $this->MarketingDescription;
    }

    /**
     * @param string $MarketingDescription
     * @return $this
     */
    public function setMarketingDescription($MarketingDescription)
    {
        $this->MarketingDescription = $MarketingDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedMarketingDescription()
    {
        return $this->FormattedMarketingDescription;
    }

    /**
     * @param string $FormattedMarketingDescription
     * @return $this
     */
    public function setFormattedMarketingDescription($FormattedMarketingDescription)
    {
        $this->FormattedMarketingDescription = $FormattedMarketingDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getLegalDisclaimer()
    {
        return $this->LegalDisclaimer;
    }

    /**
     * @param string $LegalDisclaimer
     * @return $this
     */
    public function setLegalDisclaimer($LegalDisclaimer)
    {
        $this->LegalDisclaimer = $LegalDisclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedLegalDisclaimer()
    {
        return $this->FormattedLegalDisclaimer;
    }

    /**
     * @param string $FormattedLegalDisclaimer
     * @return $this
     */
    public function setFormattedLegalDisclaimer($FormattedLegalDisclaimer)
    {
        $this->FormattedLegalDisclaimer = $FormattedLegalDisclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->ExpirationDate;
    }

    /**
     * @param string $ExpirationDate
     * @return $this
     */
    public function setExpirationDate($ExpirationDate)
    {
        $this->ExpirationDate = $ExpirationDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getInitialBalance()
    {
        return $this->InitialBalance;
    }

    /**
     * @param float $InitialBalance
     * @return $this
     */
    public function setInitialBalance($InitialBalance)
    {
        $this->InitialBalance = $InitialBalance;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardUri()
    {
        return $this->CardUri;
    }

    /**
     * @param string $CardUri
     * @return $this
     */
    public function setCardUri($CardUri)
    {
        $this->CardUri = $CardUri;
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
    public function getUsageInstructions()
    {
        return $this->UsageInstructions;
    }

    /**
     * @param string $UsageInstructions
     * @return $this
     */
    public function setUsageInstructions($UsageInstructions)
    {
        $this->UsageInstructions = $UsageInstructions;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedUsageInstructions()
    {
        return $this->FormattedUsageInstructions;
    }

    /**
     * @param string $FormattedUsageInstructions
     * @return $this
     */
    public function setFormattedUsageInstructions($FormattedUsageInstructions)
    {
        $this->FormattedUsageInstructions = $FormattedUsageInstructions;
        return $this;
    }

}