<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DiagResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class DiagResponse extends AbstractStructBase
{
    /**
     * The DiagResult
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 1
     * - nillable: true
     * @var \StructType\LuaValue[]|null
     */
    protected ?array $DiagResult;
    /**
     * Constructor method for DiagResponse
     * @uses DiagResponse::setDiagResult()
     * @param \StructType\LuaValue[] $diagResult
     */
    public function __construct(?array $diagResult)
    {
        $this
            ->setDiagResult($diagResult);
    }
    /**
     * Get DiagResult value
     * @return \StructType\LuaValue[]|null
     */
    public function getDiagResult(): ?array
    {
        return $this->DiagResult;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setDiagResult method
     * This method is willingly generated in order to preserve the one-line inline validation within the setDiagResult method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateDiagResultForArrayConstraintFromSetDiagResult(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $diagResponseDiagResultItem) {
            // validation for constraint: itemType
            if (!$diagResponseDiagResultItem instanceof \StructType\LuaValue) {
                $invalidValues[] = is_object($diagResponseDiagResultItem) ? get_class($diagResponseDiagResultItem) : sprintf('%s(%s)', gettype($diagResponseDiagResultItem), var_export($diagResponseDiagResultItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The DiagResult property can only contain items of type \StructType\LuaValue, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set DiagResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue[] $diagResult
     * @return \StructType\DiagResponse
     */
    public function setDiagResult(?array $diagResult): self
    {
        // validation for constraint: array
        if ('' !== ($diagResultArrayErrorMessage = self::validateDiagResultForArrayConstraintFromSetDiagResult($diagResult))) {
            throw new InvalidArgumentException($diagResultArrayErrorMessage, __LINE__);
        }
        $this->DiagResult = $diagResult;
        
        return $this;
    }
    /**
     * Add item to DiagResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue $item
     * @return \StructType\DiagResponse
     */
    public function addToDiagResult(\StructType\LuaValue $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\LuaValue) {
            throw new InvalidArgumentException(sprintf('The DiagResult property can only contain items of type \StructType\LuaValue, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->DiagResult[] = $item;
        
        return $this;
    }
}
