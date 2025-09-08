<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Job StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class Job extends AbstractStructBase
{
    /**
     * The id
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    protected string $id;
    /**
     * The expirationInSeconds
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var float
     */
    protected float $expirationInSeconds;
    /**
     * The category
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    protected int $category;
    /**
     * The cores
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var float
     */
    protected float $cores;
    /**
     * Constructor method for Job
     * @uses Job::setId()
     * @uses Job::setExpirationInSeconds()
     * @uses Job::setCategory()
     * @uses Job::setCores()
     * @param string $id
     * @param float $expirationInSeconds
     * @param int $category
     * @param float $cores
     */
    public function __construct(string $id, float $expirationInSeconds, int $category, float $cores)
    {
        $this
            ->setId($id)
            ->setExpirationInSeconds($expirationInSeconds)
            ->setCategory($category)
            ->setCores($cores);
    }
    /**
     * Get id value
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * Set id value
     * @param string $id
     * @return \StructType\Job
     */
    public function setId(string $id): self
    {
        // validation for constraint: string
        if (!is_null($id) && !is_string($id)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($id, true), gettype($id)), __LINE__);
        }
        $this->id = $id;
        
        return $this;
    }
    /**
     * Get expirationInSeconds value
     * @return float
     */
    public function getExpirationInSeconds(): float
    {
        return $this->expirationInSeconds;
    }
    /**
     * Set expirationInSeconds value
     * @param float $expirationInSeconds
     * @return \StructType\Job
     */
    public function setExpirationInSeconds(float $expirationInSeconds): self
    {
        // validation for constraint: float
        if (!is_null($expirationInSeconds) && !(is_float($expirationInSeconds) || is_numeric($expirationInSeconds))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($expirationInSeconds, true), gettype($expirationInSeconds)), __LINE__);
        }
        $this->expirationInSeconds = $expirationInSeconds;
        
        return $this;
    }
    /**
     * Get category value
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }
    /**
     * Set category value
     * @param int $category
     * @return \StructType\Job
     */
    public function setCategory(int $category): self
    {
        // validation for constraint: int
        if (!is_null($category) && !(is_int($category) || ctype_digit($category))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide an integer value, %s given', var_export($category, true), gettype($category)), __LINE__);
        }
        $this->category = $category;
        
        return $this;
    }
    /**
     * Get cores value
     * @return float
     */
    public function getCores(): float
    {
        return $this->cores;
    }
    /**
     * Set cores value
     * @param float $cores
     * @return \StructType\Job
     */
    public function setCores(float $cores): self
    {
        // validation for constraint: float
        if (!is_null($cores) && !(is_float($cores) || is_numeric($cores))) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a float value, %s given', var_export($cores, true), gettype($cores)), __LINE__);
        }
        $this->cores = $cores;
        
        return $this;
    }
}
