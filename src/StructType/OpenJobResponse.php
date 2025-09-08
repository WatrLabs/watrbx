<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OpenJobResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class OpenJobResponse extends AbstractStructBase
{
    /**
     * The OpenJobResult
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\LuaValue[]
     */
    protected ?array $OpenJobResult = null;
    /**
     * Constructor method for OpenJobResponse
     * @uses OpenJobResponse::setOpenJobResult()
     * @param \StructType\LuaValue[] $openJobResult
     */
    public function __construct(?array $openJobResult = null)
    {
        $this
            ->setOpenJobResult($openJobResult);
    }
    /**
     * Get OpenJobResult value
     * @return \StructType\LuaValue[]
     */
    public function getOpenJobResult(): ?array
    {
        return $this->OpenJobResult;
    }
    /**
     * This method is responsible for validating the value(s) passed to the setOpenJobResult method
     * This method is willingly generated in order to preserve the one-line inline validation within the setOpenJobResult method
     * This has to validate that each item contained by the array match the itemType constraint
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateOpenJobResultForArrayConstraintFromSetOpenJobResult(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $openJobResponseOpenJobResultItem) {
            // validation for constraint: itemType
            if (!$openJobResponseOpenJobResultItem instanceof \StructType\LuaValue) {
                $invalidValues[] = is_object($openJobResponseOpenJobResultItem) ? get_class($openJobResponseOpenJobResultItem) : sprintf('%s(%s)', gettype($openJobResponseOpenJobResultItem), var_export($openJobResponseOpenJobResultItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The OpenJobResult property can only contain items of type \StructType\LuaValue, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set OpenJobResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue[] $openJobResult
     * @return \StructType\OpenJobResponse
     */
    public function setOpenJobResult(?array $openJobResult = null): self
    {
        // validation for constraint: array
        if ('' !== ($openJobResultArrayErrorMessage = self::validateOpenJobResultForArrayConstraintFromSetOpenJobResult($openJobResult))) {
            throw new InvalidArgumentException($openJobResultArrayErrorMessage, __LINE__);
        }
        $this->OpenJobResult = $openJobResult;
        
        return $this;
    }
    /**
     * Add item to OpenJobResult value
     * @throws InvalidArgumentException
     * @param \StructType\LuaValue $item
     * @return \StructType\OpenJobResponse
     */
    public function addToOpenJobResult(\StructType\LuaValue $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\LuaValue) {
            throw new InvalidArgumentException(sprintf('The OpenJobResult property can only contain items of type \StructType\LuaValue, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->OpenJobResult[] = $item;
        
        return $this;
    }
}
