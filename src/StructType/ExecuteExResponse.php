<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ExecuteExResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class ExecuteExResponse extends AbstractStructBase
{
    /**
     * The ExecuteExResult
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $ExecuteExResult = null;
    /**
     * Constructor method for ExecuteExResponse
     * @uses ExecuteExResponse::setExecuteExResult()
     * @param \ArrayType\ArrayOfLuaValue $executeExResult
     */
    public function __construct(?\ArrayType\ArrayOfLuaValue $executeExResult = null)
    {
        $this
            ->setExecuteExResult($executeExResult);
    }
    /**
     * Get ExecuteExResult value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getExecuteExResult(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->ExecuteExResult;
    }
    /**
     * Set ExecuteExResult value
     * @param \ArrayType\ArrayOfLuaValue $executeExResult
     * @return \StructType\ExecuteExResponse
     */
    public function setExecuteExResult(?\ArrayType\ArrayOfLuaValue $executeExResult = null): self
    {
        $this->ExecuteExResult = $executeExResult;
        
        return $this;
    }
}
