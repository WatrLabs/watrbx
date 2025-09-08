<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for BatchJobExResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class BatchJobExResponse extends AbstractStructBase
{
    /**
     * The BatchJobExResult
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $BatchJobExResult = null;
    /**
     * Constructor method for BatchJobExResponse
     * @uses BatchJobExResponse::setBatchJobExResult()
     * @param \ArrayType\ArrayOfLuaValue $batchJobExResult
     */
    public function __construct(?\ArrayType\ArrayOfLuaValue $batchJobExResult = null)
    {
        $this
            ->setBatchJobExResult($batchJobExResult);
    }
    /**
     * Get BatchJobExResult value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getBatchJobExResult(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->BatchJobExResult;
    }
    /**
     * Set BatchJobExResult value
     * @param \ArrayType\ArrayOfLuaValue $batchJobExResult
     * @return \StructType\BatchJobExResponse
     */
    public function setBatchJobExResult(?\ArrayType\ArrayOfLuaValue $batchJobExResult = null): self
    {
        $this->BatchJobExResult = $batchJobExResult;
        
        return $this;
    }
}
