<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for RenewLease StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class RenewLease extends AbstractStructBase
{
    /**
     * The jobID
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    protected string $jobID;
    /**
     * The expirationInSeconds
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var float
     */
    protected float $expirationInSeconds;
    /**
     * Constructor method for RenewLease
     * @uses RenewLease::setJobID()
     * @uses RenewLease::setExpirationInSeconds()
     * @param string $jobID
     * @param float $expirationInSeconds
     */
    public function __construct(string $jobID, float $expirationInSeconds)
    {
        $this
            ->setJobID($jobID)
            ->setExpirationInSeconds($expirationInSeconds);
    }
    /**
     * Get jobID value
     * @return string
     */
    public function getJobID(): string
    {
        return $this->jobID;
    }
    /**
     * Set jobID value
     * @param string $jobID
     * @return \StructType\RenewLease
     */
    public function setJobID(string $jobID): self
    {
        // validation for constraint: string
        if (!is_null($jobID) && !is_string($jobID)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($jobID, true), gettype($jobID)), __LINE__);
        }
        $this->jobID = $jobID;
        
        return $this;
    }
    /**
     * Get expirationInSeconds value
     * @return float
     */
    public function getExpirationInSeconds(): float
    {
        return $this->expirationInSeconds;
    }
    /**
     * Set expirationInSeconds value
     * @param float $expirationInSeconds
     * @return \StructType\RenewLease
     */
    public function setExpirationInSeconds(float $expirationInSeconds): self
    {
        // validation for constraint: float
        if (!is_null($expirationInSeconds) && !(is_float($expirationInSeconds) || is_numeric($expirationInSeconds))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($expirationInSeconds, true), gettype($expirationInSeconds)), __LINE__);
        }
        $this->expirationInSeconds = $expirationInSeconds;
        
        return $this;
    }
}
