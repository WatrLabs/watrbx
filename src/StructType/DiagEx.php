<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DiagEx StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class DiagEx extends AbstractStructBase
{
    /**
     * The type
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    protected int $type;
    /**
     * The jobID
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $jobID = null;
    /**
     * Constructor method for DiagEx
     * @uses DiagEx::setType()
     * @uses DiagEx::setJobID()
     * @param int $type
     * @param string $jobID
     */
    public function __construct(int $type, ?string $jobID = null)
    {
        $this
            ->setType($type)
            ->setJobID($jobID);
    }
    /**
     * Get type value
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }
    /**
     * Set type value
     * @param int $type
     * @return \StructType\DiagEx
     */
    public function setType(int $type): self
    {
        // validation for constraint: int
        if (!is_null($type) && !(is_int($type) || ctype_digit($type))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($type, true), gettype($type)), __LINE__);
        }
        $this->type = $type;
        
        return $this;
    }
    /**
     * Get jobID value
     * @return string|null
     */
    public function getJobID(): ?string
    {
        return $this->jobID;
    }
    /**
     * Set jobID value
     * @param string $jobID
     * @return \StructType\DiagEx
     */
    public function setJobID(?string $jobID = null): self
    {
        // validation for constraint: string
        if (!is_null($jobID) && !is_string($jobID)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($jobID, true), gettype($jobID)), __LINE__);
        }
        $this->jobID = $jobID;
        
        return $this;
    }
}
