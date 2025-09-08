<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CloseAllJobsResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class CloseAllJobsResponse extends AbstractStructBase
{
    /**
     * The CloseAllJobsResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    protected int $CloseAllJobsResult;
    /**
     * Constructor method for CloseAllJobsResponse
     * @uses CloseAllJobsResponse::setCloseAllJobsResult()
     * @param int $closeAllJobsResult
     */
    public function __construct(int $closeAllJobsResult)
    {
        $this
            ->setCloseAllJobsResult($closeAllJobsResult);
    }
    /**
     * Get CloseAllJobsResult value
     * @return int
     */
    public function getCloseAllJobsResult(): int
    {
        return $this->CloseAllJobsResult;
    }
    /**
     * Set CloseAllJobsResult value
     * @param int $closeAllJobsResult
     * @return \StructType\CloseAllJobsResponse
     */
    public function setCloseAllJobsResult(int $closeAllJobsResult): self
    {
        // validation for constraint: int
        if (!is_null($closeAllJobsResult) && !(is_int($closeAllJobsResult) || ctype_digit($closeAllJobsResult))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($closeAllJobsResult, true), gettype($closeAllJobsResult)), __LINE__);
        }
        $this->CloseAllJobsResult = $closeAllJobsResult;
        
        return $this;
    }
}
