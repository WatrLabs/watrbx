<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Status StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class Status extends AbstractStructBase
{
    /**
     * The environmentCount
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    protected int $environmentCount;
    /**
     * The version
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $version = null;
    /**
     * Constructor method for Status
     * @uses Status::setEnvironmentCount()
     * @uses Status::setVersion()
     * @param int $environmentCount
     * @param string $version
     */
    public function __construct(int $environmentCount, ?string $version = null)
    {
        $this
            ->setEnvironmentCount($environmentCount)
            ->setVersion($version);
    }
    /**
     * Get environmentCount value
     * @return int
     */
    public function getEnvironmentCount(): int
    {
        return $this->environmentCount;
    }
    /**
     * Set environmentCount value
     * @param int $environmentCount
     * @return \StructType\Status
     */
    public function setEnvironmentCount(int $environmentCount): self
    {
        // validation for constraint: int
        if (!is_null($environmentCount) && !(is_int($environmentCount) || ctype_digit($environmentCount))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($environmentCount, true), gettype($environmentCount)), __LINE__);
        }
        $this->environmentCount = $environmentCount;
        
        return $this;
    }
    /**
     * Get version value
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }
    /**
     * Set version value
     * @param string $version
     * @return \StructType\Status
     */
    public function setVersion(?string $version = null): self
    {
        // validation for constraint: string
        if (!is_null($version) && !is_string($version)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($version, true), gettype($version)), __LINE__);
        }
        $this->version = $version;
        
        return $this;
    }
}
