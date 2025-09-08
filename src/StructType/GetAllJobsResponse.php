<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAllJobsResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetAllJobsResponse extends AbstractStructBase
{
    /**
     * The GetAllJobsResult
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 1
     * - nillable: true
     * @var \StructType\Job[]|null
     */
    protected ?array $GetAllJobsResult;
    /**
     * Constructor method for GetAllJobsResponse
     * @uses GetAllJobsResponse::setGetAllJobsResult()
     * @param \StructType\Job[] $getAllJobsResult
     */
    public function __construct(?array $getAllJobsResult)
    {
        $this
            ->setGetAllJobsResult($getAllJobsResult);
    }
    /**
     * Get GetAllJobsResult value
     * @return \StructType\Job[]|null
     */
    public function getGetAllJobsResult(): ?array
    {
        return $this->GetAllJobsResult;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setGetAllJobsResult method
     * This method is willingly generated in order to preserve the one-line inline validation within the setGetAllJobsResult method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateGetAllJobsResultForArrayConstraintFromSetGetAllJobsResult(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $getAllJobsResponseGetAllJobsResultItem) {
            // validation for constraint: itemType
            if (!$getAllJobsResponseGetAllJobsResultItem instanceof \StructType\Job) {
                $invalidValues[] = is_object($getAllJobsResponseGetAllJobsResultItem) ? get_class($getAllJobsResponseGetAllJobsResultItem) : sprintf('%s(%s)', gettype($getAllJobsResponseGetAllJobsResultItem), var_export($getAllJobsResponseGetAllJobsResultItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The GetAllJobsResult property can only contain items of type \StructType\Job, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set GetAllJobsResult value
     * @throws InvalidArgumentException
     * @param \StructType\Job[] $getAllJobsResult
     * @return \StructType\GetAllJobsResponse
     */
    public function setGetAllJobsResult(?array $getAllJobsResult): self
    {
        // validation for constraint: array
        if ('' !== ($getAllJobsResultArrayErrorMessage = self::validateGetAllJobsResultForArrayConstraintFromSetGetAllJobsResult($getAllJobsResult))) {
            throw new InvalidArgumentException($getAllJobsResultArrayErrorMessage, __LINE__);
        }
        $this->GetAllJobsResult = $getAllJobsResult;
        
        return $this;
    }
    /**
     * Add item to GetAllJobsResult value
     * @throws InvalidArgumentException
     * @param \StructType\Job $item
     * @return \StructType\GetAllJobsResponse
     */
    public function addToGetAllJobsResult(\StructType\Job $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\Job) {
            throw new InvalidArgumentException(sprintf('The GetAllJobsResult property can only contain items of type \StructType\Job, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->GetAllJobsResult[] = $item;
        
        return $this;
    }
}
