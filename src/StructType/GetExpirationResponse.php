<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetExpirationResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetExpirationResponse extends AbstractStructBase
{
    /**
     * The GetExpirationResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var float
     */
    protected float $GetExpirationResult;
    /**
     * Constructor method for GetExpirationResponse
     * @uses GetExpirationResponse::setGetExpirationResult()
     * @param float $getExpirationResult
     */
    public function __construct(float $getExpirationResult)
    {
        $this
            ->setGetExpirationResult($getExpirationResult);
    }
    /**
     * Get GetExpirationResult value
     * @return float
     */
    public function getGetExpirationResult(): float
    {
        return $this->GetExpirationResult;
    }
    /**
     * Set GetExpirationResult value
     * @param float $getExpirationResult
     * @return \StructType\GetExpirationResponse
     */
    public function setGetExpirationResult(float $getExpirationResult): self
    {
        // validation for constraint: float
        if (!is_null($getExpirationResult) && !(is_float($getExpirationResult) || is_numeric($getExpirationResult))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($getExpirationResult, true), gettype($getExpirationResult)), __LINE__);
        }
        $this->GetExpirationResult = $getExpirationResult;
        
        return $this;
    }
}
