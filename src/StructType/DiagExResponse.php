<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DiagExResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class DiagExResponse extends AbstractStructBase
{
    /**
     * The DiagExResult
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $DiagExResult = null;
    /**
     * Constructor method for DiagExResponse
     * @uses DiagExResponse::setDiagExResult()
     * @param \ArrayType\ArrayOfLuaValue $diagExResult
     */
    public function __construct(?\ArrayType\ArrayOfLuaValue $diagExResult = null)
    {
        $this
            ->setDiagExResult($diagExResult);
    }
    /**
     * Get DiagExResult value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getDiagExResult(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->DiagExResult;
    }
    /**
     * Set DiagExResult value
     * @param \ArrayType\ArrayOfLuaValue $diagExResult
     * @return \StructType\DiagExResponse
     */
    public function setDiagExResult(?\ArrayType\ArrayOfLuaValue $diagExResult = null): self
    {
        $this->DiagExResult = $diagExResult;
        
        return $this;
    }
}
