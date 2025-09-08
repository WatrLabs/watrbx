<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OpenJobExResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class OpenJobExResponse extends AbstractStructBase
{
    /**
     * The OpenJobExResult
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $OpenJobExResult = null;
    /**
     * Constructor method for OpenJobExResponse
     * @uses OpenJobExResponse::setOpenJobExResult()
     * @param \ArrayType\ArrayOfLuaValue $openJobExResult
     */
    public function __construct(?\ArrayType\ArrayOfLuaValue $openJobExResult = null)
    {
        $this
            ->setOpenJobExResult($openJobExResult);
    }
    /**
     * Get OpenJobExResult value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getOpenJobExResult(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->OpenJobExResult;
    }
    /**
     * Set OpenJobExResult value
     * @param \ArrayType\ArrayOfLuaValue $openJobExResult
     * @return \StructType\OpenJobExResponse
     */
    public function setOpenJobExResult(?\ArrayType\ArrayOfLuaValue $openJobExResult = null): self
    {
        $this->OpenJobExResult = $openJobExResult;
        
        return $this;
    }
}
