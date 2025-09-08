<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for RenewLeaseResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class RenewLeaseResponse extends AbstractStructBase
{
    /**
     * The RenewLeaseResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var float
     */
    protected float $RenewLeaseResult;
    /**
     * Constructor method for RenewLeaseResponse
     * @uses RenewLeaseResponse::setRenewLeaseResult()
     * @param float $renewLeaseResult
     */
    public function __construct(float $renewLeaseResult)
    {
        $this
            ->setRenewLeaseResult($renewLeaseResult);
    }
    /**
     * Get RenewLeaseResult value
     * @return float
     */
    public function getRenewLeaseResult(): float
    {
        return $this->RenewLeaseResult;
    }
    /**
     * Set RenewLeaseResult value
     * @param float $renewLeaseResult
     * @return \StructType\RenewLeaseResponse
     */
    public function setRenewLeaseResult(float $renewLeaseResult): self
    {
        // validation for constraint: float
        if (!is_null($renewLeaseResult) && !(is_float($renewLeaseResult) || is_numeric($renewLeaseResult))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($renewLeaseResult, true), gettype($renewLeaseResult)), __LINE__);
        }
        $this->RenewLeaseResult = $renewLeaseResult;
        
        return $this;
    }
}
