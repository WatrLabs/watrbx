<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetVersionResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetVersionResponse extends AbstractStructBase
{
    /**
     * The GetVersionResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    protected string $GetVersionResult;
    /**
     * Constructor method for GetVersionResponse
     * @uses GetVersionResponse::setGetVersionResult()
     * @param string $getVersionResult
     */
    public function __construct(string $getVersionResult)
    {
        $this
            ->setGetVersionResult($getVersionResult);
    }
    /**
     * Get GetVersionResult value
     * @return string
     */
    public function getGetVersionResult(): string
    {
        return $this->GetVersionResult;
    }
    /**
     * Set GetVersionResult value
     * @param string $getVersionResult
     * @return \StructType\GetVersionResponse
     */
    public function setGetVersionResult(string $getVersionResult): self
    {
        // validation for constraint: string
        if (!is_null($getVersionResult) && !is_string($getVersionResult)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($getVersionResult, true), gettype($getVersionResult)), __LINE__);
        }
        $this->GetVersionResult = $getVersionResult;
        
        return $this;
    }
}
