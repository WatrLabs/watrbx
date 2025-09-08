<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetExpiration StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetExpiration extends AbstractStructBase
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
     * Constructor method for GetExpiration
     * @uses GetExpiration::setJobID()
     * @param string $jobID
     */
    public function __construct(string $jobID)
    {
        $this
            ->setJobID($jobID);
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
     * @return \StructType\GetExpiration
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
}
