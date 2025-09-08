<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ExecuteResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class ExecuteResponse extends AbstractStructBase
{
    /**
     * The ExecuteResult
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 1
     * - nillable: true
     * @var \StructType\LuaValue[]|null
     */
    protected ?array $ExecuteResult;
    /**
     * Constructor method for ExecuteResponse
     * @uses ExecuteResponse::setExecuteResult()
     * @param \StructType\LuaValue[] $executeResult
     */
    public function __construct(?array $executeResult)
    {
        $this
            ->setExecuteResult($executeResult);
    }
    /**
     * Get ExecuteResult value
     * @return \StructType\LuaValue[]|null
     */
    public function getExecuteResult(): ?array
    {
        return $this->ExecuteResult;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setExecuteResult method
     * This method is willingly generated in order to preserve the one-line inline validation within the setExecuteResult method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateExecuteResultForArrayConstraintFromSetExecuteResult(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $executeResponseExecuteResultItem) {
            // validation for constraint: itemType
            if (!$executeResponseExecuteResultItem instanceof \StructType\LuaValue) {
                $invalidValues[] = is_object($executeResponseExecuteResultItem) ? get_class($executeResponseExecuteResultItem) : sprintf('%s(%s)', gettype($executeResponseExecuteResultItem), var_export($executeResponseExecuteResultItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ExecuteResult property can only contain items of type \StructType\LuaValue, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set ExecuteResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue[] $executeResult
     * @return \StructType\ExecuteResponse
     */
    public function setExecuteResult(?array $executeResult): self
    {
        // validation for constraint: array
        if ('' !== ($executeResultArrayErrorMessage = self::validateExecuteResultForArrayConstraintFromSetExecuteResult($executeResult))) {
            throw new InvalidArgumentException($executeResultArrayErrorMessage, __LINE__);
        }
        $this->ExecuteResult = $executeResult;
        
        return $this;
    }
    /**
     * Add item to ExecuteResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue $item
     * @return \StructType\ExecuteResponse
     */
    public function addToExecuteResult(\StructType\LuaValue $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\LuaValue) {
            throw new InvalidArgumentException(sprintf('The ExecuteResult property can only contain items of type \StructType\LuaValue, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->ExecuteResult[] = $item;
        
        return $this;
    }
}
