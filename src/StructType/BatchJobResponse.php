<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for BatchJobResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class BatchJobResponse extends AbstractStructBase
{
    /**
     * The BatchJobResult
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 1
     * - nillable: true
     * @var \StructType\LuaValue[]|null
     */
    protected ?array $BatchJobResult;
    /**
     * Constructor method for BatchJobResponse
     * @uses BatchJobResponse::setBatchJobResult()
     * @param \StructType\LuaValue[] $batchJobResult
     */
    public function __construct(?array $batchJobResult)
    {
        $this
            ->setBatchJobResult($batchJobResult);
    }
    /**
     * Get BatchJobResult value
     * @return \StructType\LuaValue[]|null
     */
    public function getBatchJobResult(): ?array
    {
        return $this->BatchJobResult;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setBatchJobResult method
     * This method is willingly generated in order to preserve the one-line inline validation within the setBatchJobResult method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateBatchJobResultForArrayConstraintFromSetBatchJobResult(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $batchJobResponseBatchJobResultItem) {
            // validation for constraint: itemType
            if (!$batchJobResponseBatchJobResultItem instanceof \StructType\LuaValue) {
                $invalidValues[] = is_object($batchJobResponseBatchJobResultItem) ? get_class($batchJobResponseBatchJobResultItem) : sprintf('%s(%s)', gettype($batchJobResponseBatchJobResultItem), var_export($batchJobResponseBatchJobResultItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The BatchJobResult property can only contain items of type \StructType\LuaValue, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set BatchJobResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue[] $batchJobResult
     * @return \StructType\BatchJobResponse
     */
    public function setBatchJobResult(?array $batchJobResult): self
    {
        // validation for constraint: array
        if ('' !== ($batchJobResultArrayErrorMessage = self::validateBatchJobResultForArrayConstraintFromSetBatchJobResult($batchJobResult))) {
            throw new InvalidArgumentException($batchJobResultArrayErrorMessage, __LINE__);
        }
        $this->BatchJobResult = $batchJobResult;
        
        return $this;
    }
    /**
     * Add item to BatchJobResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue $item
     * @return \StructType\BatchJobResponse
     */
    public function addToBatchJobResult(\StructType\LuaValue $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\LuaValue) {
            throw new InvalidArgumentException(sprintf('The BatchJobResult property can only contain items of type \StructType\LuaValue, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->BatchJobResult[] = $item;
        
        return $this;
    }
}
