<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfJob ArrayType
 * @subpackage Arrays
 */
class ArrayOfJob extends AbstractStructArrayBase
{
    /**
     * The Job
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\Job[]|null
     */
    protected ?array $Job = null;
    /**
     * Constructor method for ArrayOfJob
     * @uses ArrayOfJob::setJob()
     * @param \StructType\Job[] $job
     */
    public function __construct(?array $job = null)
    {
        $this
            ->setJob($job);
    }
    /**
     * Get Job value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\Job[]|null
     */
    public function getJob(): ?array
    {
        return $this->Job ?? null;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setJob method
     * This method is willingly generated in order to preserve the one-line inline validation within the setJob method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateJobForArrayConstraintFromSetJob(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfJobJobItem) {
            // validation for constraint: itemType
            if (!$arrayOfJobJobItem instanceof \StructType\Job) {
                $invalidValues[] = is_object($arrayOfJobJobItem) ? get_class($arrayOfJobJobItem) : sprintf('%s(%s)', gettype($arrayOfJobJobItem), var_export($arrayOfJobJobItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The Job property can only contain items of type \StructType\Job, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set Job value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws InvalidArgumentException
     * @param \StructType\Job[] $job
     * @return \ArrayType\ArrayOfJob
     */
    public function setJob(?array $job = null): self
    {
        // validation for constraint: array
        if ('' !== ($jobArrayErrorMessage = self::validateJobForArrayConstraintFromSetJob($job))) {
            throw new InvalidArgumentException($jobArrayErrorMessage, __LINE__);
        }
        if (is_null($job) || (is_array($job) && empty($job))) {
            unset($this->Job);
        } else {
            $this->Job = $job;
        }
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\Job|null
     */
    public function current(): ?\StructType\Job
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\Job|null
     */
    public function item($index): ?\StructType\Job
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\Job|null
     */
    public function first(): ?\StructType\Job
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\Job|null
     */
    public function last(): ?\StructType\Job
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\Job|null
     */
    public function offsetGet($offset): ?\StructType\Job
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param \StructType\Job $item
     * @return \ArrayType\ArrayOfJob
     */
    public function add($item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\Job) {
            throw new InvalidArgumentException(sprintf('The Job property can only contain items of type \StructType\Job, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Job
     */
    public function getAttributeName(): string
    {
        return 'Job';
    }
}
