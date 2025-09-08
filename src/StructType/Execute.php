<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Execute StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class Execute extends AbstractStructBase
{
    /**
     * The jobID
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    protected string $jobID;
    /**
     * The script
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \StructType\ScriptExecution
     */
    protected \StructType\ScriptExecution $script;
    /**
     * Constructor method for Execute
     * @uses Execute::setJobID()
     * @uses Execute::setScript()
     * @param string $jobID
     * @param \StructType\ScriptExecution $script
     */
    public function __construct(string $jobID, \StructType\ScriptExecution $script)
    {
        $this
            ->setJobID($jobID)
            ->setScript($script);
    }
    /**
     * Get jobID value
     * @return string
     */
    public function getJobID(): string
    {
        return $this->jobID;
    }
    /**
     * Set jobID value
     * @param string $jobID
     * @return \StructType\Execute
     */
    public function setJobID(string $jobID): self
    {
        // validation for constraint: string
        if (!is_null($jobID) && !is_string($jobID)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($jobID, true), gettype($jobID)), __LINE__);
        }
        $this->jobID = $jobID;
        
        return $this;
    }
    /**
     * Get script value
     * @return \StructType\ScriptExecution
     */
    public function getScript(): \StructType\ScriptExecution
    {
        return $this->script;
    }
    /**
     * Set script value
     * @param \StructType\ScriptExecution $script
     * @return \StructType\Execute
     */
    public function setScript(\StructType\ScriptExecution $script): self
    {
        $this->script = $script;
        
        return $this;
    }
}
