<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ScriptExecution StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class ScriptExecution extends AbstractStructBase
{
    /**
     * The name
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $name = null;
    /**
     * The script
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $script = null;
    /**
     * The arguments
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \ArrayType\ArrayOfLuaValue|null
     */
    protected ?\ArrayType\ArrayOfLuaValue $arguments = null;
    /**
     * Constructor method for ScriptExecution
     * @uses ScriptExecution::setName()
     * @uses ScriptExecution::setScript()
     * @uses ScriptExecution::setArguments()
     * @param string $name
     * @param string $script
     * @param \ArrayType\ArrayOfLuaValue $arguments
     */
    public function __construct(?string $name = null, ?string $script = null, ?\ArrayType\ArrayOfLuaValue $arguments = null)
    {
        $this
            ->setName($name)
            ->setScript($script)
            ->setArguments($arguments);
    }
    /**
     * Get name value
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Set name value
     * @param string $name
     * @return \StructType\ScriptExecution
     */
    public function setName(?string $name = null): self
    {
        // validation for constraint: string
        if (!is_null($name) && !is_string($name)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($name, true), gettype($name)), __LINE__);
        }
        $this->name = $name;
        
        return $this;
    }
    /**
     * Get script value
     * @return string|null
     */
    public function getScript(): ?string
    {
        return $this->script;
    }
    /**
     * Set script value
     * @param string $script
     * @return \StructType\ScriptExecution
     */
    public function setScript(?string $script = null): self
    {
        // validation for constraint: string
        if (!is_null($script) && !is_string($script)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($script, true), gettype($script)), __LINE__);
        }
        $this->script = $script;
        
        return $this;
    }
    /**
     * Get arguments value
     * @return \ArrayType\ArrayOfLuaValue|null
     */
    public function getArguments(): ?\ArrayType\ArrayOfLuaValue
    {
        return $this->arguments;
    }
    /**
     * Set arguments value
     * @param \ArrayType\ArrayOfLuaValue $arguments
     * @return \StructType\ScriptExecution
     */
    public function setArguments(?\ArrayType\ArrayOfLuaValue $arguments = null): self
    {
        $this->arguments = $arguments;
        
        return $this;
    }
}
