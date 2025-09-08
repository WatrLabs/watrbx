<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CloseExpiredJobsResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class CloseExpiredJobsResponse extends AbstractStructBase
{
    /**
     * The CloseExpiredJobsResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    protected int $CloseExpiredJobsResult;
    /**
     * Constructor method for CloseExpiredJobsResponse
     * @uses CloseExpiredJobsResponse::setCloseExpiredJobsResult()
     * @param int $closeExpiredJobsResult
     */
    public function __construct(int $closeExpiredJobsResult)
    {
        $this
            ->setCloseExpiredJobsResult($closeExpiredJobsResult);
    }
    /**
     * Get CloseExpiredJobsResult value
     * @return int
     */
    public function getCloseExpiredJobsResult(): int
    {
        return $this->CloseExpiredJobsResult;
    }
    /**
     * Set CloseExpiredJobsResult value
     * @param int $closeExpiredJobsResult
     * @return \StructType\CloseExpiredJobsResponse
     */
    public function setCloseExpiredJobsResult(int $closeExpiredJobsResult): self
    {
        // validation for constraint: int
        if (!is_null($closeExpiredJobsResult) && !(is_int($closeExpiredJobsResult) || ctype_digit($closeExpiredJobsResult))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($closeExpiredJobsResult, true), gettype($closeExpiredJobsResult)), __LINE__);
        }
        $this->CloseExpiredJobsResult = $closeExpiredJobsResult;
        
        return $this;
    }
}
