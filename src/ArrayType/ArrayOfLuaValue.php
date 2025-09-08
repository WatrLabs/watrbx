<?php

declare(strict_types=1);

namespace ArrayType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfLuaValue ArrayType
 * @subpackage Arrays
 */
class ArrayOfLuaValue extends AbstractStructArrayBase
{
    /**
     * The LuaValue
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\LuaValue[]|null
     */
    protected ?array $LuaValue = null;
    /**
     * Constructor method for ArrayOfLuaValue
     * @uses ArrayOfLuaValue::setLuaValue()
     * @param \StructType\LuaValue[] $luaValue
     */
    public function __construct(?array $luaValue = null)
    {
        $this
            ->setLuaValue($luaValue);
    }
    /**
     * Get LuaValue value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\LuaValue[]|null
     */
    public function getLuaValue(): ?array
    {
        return $this->LuaValue ?? null;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setLuaValue method
     * This method is willingly generated in order to preserve the one-line inline validation within the setLuaValue method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateLuaValueForArrayConstraintFromSetLuaValue(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $arrayOfLuaValueLuaValueItem) {
            // validation for constraint: itemType
            if (!$arrayOfLuaValueLuaValueItem instanceof \StructType\LuaValue) {
                $invalidValues[] = is_object($arrayOfLuaValueLuaValueItem) ? get_class($arrayOfLuaValueLuaValueItem) : sprintf('%s(%s)', gettype($arrayOfLuaValueLuaValueItem), var_export($arrayOfLuaValueLuaValueItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The LuaValue property can only contain items of type \StructType\LuaValue, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set LuaValue value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue[] $luaValue
     * @return \ArrayType\ArrayOfLuaValue
     */
    public function setLuaValue(?array $luaValue = null): self
    {
        // validation for constraint: array
        if ('' !== ($luaValueArrayErrorMessage = self::validateLuaValueForArrayConstraintFromSetLuaValue($luaValue))) {
            throw new InvalidArgumentException($luaValueArrayErrorMessage, __LINE__);
        }
        if (is_null($luaValue) || (is_array($luaValue) && empty($luaValue))) {
            unset($this->LuaValue);
        } else {
            $this->LuaValue = $luaValue;
        }
        
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\LuaValue|null
     */
    public function current(): ?\StructType\LuaValue
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\LuaValue|null
     */
    public function item($index): ?\StructType\LuaValue
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\LuaValue|null
     */
    public function first(): ?\StructType\LuaValue
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\LuaValue|null
     */
    public function last(): ?\StructType\LuaValue
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\LuaValue|null
     */
    public function offsetGet($offset): ?\StructType\LuaValue
    {
        return parent::offsetGet($offset);
    }
    /**
     * Add element to array
     * @see AbstractStructArrayBase::add()
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue $item
     * @return \ArrayType\ArrayOfLuaValue
     */
    public function add($item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\LuaValue) {
            throw new InvalidArgumentException(sprintf('The LuaValue property can only contain items of type \StructType\LuaValue, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        return parent::add($item);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string LuaValue
     */
    public function getAttributeName(): string
    {
        return 'LuaValue';
    }
}
