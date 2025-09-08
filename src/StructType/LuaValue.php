<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LuaValue StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class LuaValue extends AbstractStructBase
{
    /**
     * The type
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    protected string $type;
    /**
     * The value
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $value = null;
    /**
     * The table
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $table = null;
    /**
     * Constructor method for LuaValue
     * @uses LuaValue::setType()
     * @uses LuaValue::setValue()
     * @uses LuaValue::setTable()
     * @param string $type
     * @param string $value
     * @param \ArrayType\ArrayOfLuaValue $table
     */
    public function __construct(string $type, ?string $value = null, ?\ArrayType\ArrayOfLuaValue $table = null)
    {
        $this
            ->setType($type)
            ->setValue($value)
            ->setTable($table);
    }
    /**
     * Get type value
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * Set type value
     * @uses \EnumType\LuaType::valueIsValid()
     * @uses \EnumType\LuaType::getValidValues()
     * @throws InvalidArgumentException
     * @param string $type
     * @return \StructType\LuaValue
     */
    public function setType(string $type): self
    {
        // validation for constraint: enumeration
        if (!\EnumType\LuaType::valueIsValid($type)) {
            throw new InvalidArgumentException(sprintf('Invalid value(s) %s, please use one of: %s from enumeration class \EnumType\LuaType', is_array($type) ? implode(', ', $type) : var_export($type, true), implode(', ', \EnumType\LuaType::getValidValues())), __LINE__);
        }
        $this->type = $type;
        
        return $this;
    }
    /**
     * Get value value
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Set value value
     * @param string $value
     * @return \StructType\LuaValue
     */
    public function setValue(?string $value = null): self
    {
        // validation for constraint: string
        if (!is_null($value) && !is_string($value)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($value, true), gettype($value)), __LINE__);
        }
        $this->value = $value;
        
        return $this;
    }
    /**
     * Get table value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getTable(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->table;
    }
    /**
     * Set table value
     * @param \ArrayType\ArrayOfLuaValue $table
     * @return \StructType\LuaValue
     */
    public function setTable(?\ArrayType\ArrayOfLuaValue $table = null): self
    {
        $this->table = $table;
        
        return $this;
    }
}
