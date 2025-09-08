<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAllJobsExResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetAllJobsExResponse extends AbstractStructBase
{
    /**
     * The GetAllJobsExResult
     * @var \ArrayType\ArrayOfJob|null
     */
    protected ?\ArrayType\ArrayOfJob $GetAllJobsExResult = null;
    /**
     * Constructor method for GetAllJobsExResponse
     * @uses GetAllJobsExResponse::setGetAllJobsExResult()
     * @param \ArrayType\ArrayOfJob $getAllJobsExResult
     */
    public function __construct(?\ArrayType\ArrayOfJob $getAllJobsExResult = null)
    {
        $this
            ->setGetAllJobsExResult($getAllJobsExResult);
    }
    /**
     * Get GetAllJobsExResult value
     * @return \ArrayType\ArrayOfJob|null
     */
    public function getGetAllJobsExResult(): ?\ArrayType\ArrayOfJob
    {
        return $this->GetAllJobsExResult;
    }
    /**
     * Set GetAllJobsExResult value
     * @param \ArrayType\ArrayOfJob $getAllJobsExResult
     * @return \StructType\GetAllJobsExResponse
     */
    public function setGetAllJobsExResult(?\ArrayType\ArrayOfJob $getAllJobsExResult = null): self
    {
        $this->GetAllJobsExResult = $getAllJobsExResult;
        
        return $this;
    }
}
