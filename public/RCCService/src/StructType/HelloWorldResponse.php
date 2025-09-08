<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for HelloWorldResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class HelloWorldResponse extends AbstractStructBase
{
    /**
     * The HelloWorldResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $HelloWorldResult = null;
    /**
     * Constructor method for HelloWorldResponse
     * @uses HelloWorldResponse::setHelloWorldResult()
     * @param string $helloWorldResult
     */
    public function __construct(?string $helloWorldResult = null)
    {
        $this
            ->setHelloWorldResult($helloWorldResult);
    }
    /**
     * Get HelloWorldResult value
     * @return string|null
     */
    public function getHelloWorldResult(): ?string
    {
        return $this->HelloWorldResult;
    }
    /**
     * Set HelloWorldResult value
     * @param string $helloWorldResult
     * @return \StructType\HelloWorldResponse
     */
    public function setHelloWorldResult(?string $helloWorldResult = null): self
    {
        // validation for constraint: string
        if (!is_null($helloWorldResult) && !is_string($helloWorldResult)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($helloWorldResult, true), gettype($helloWorldResult)), __LINE__);
        }
        $this->HelloWorldResult = $helloWorldResult;
        
        return $this;
    }
}
