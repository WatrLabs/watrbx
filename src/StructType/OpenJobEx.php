<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OpenJobEx StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class OpenJobEx extends AbstractStructBase
{
    /**
     * The job
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \StructType\Job
     */
    protected \StructType\Job $job;
    /**
     * The script
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ScriptExecution|null
     */
    protected ?\StructType\ScriptExecution $script = null;
    /**
     * Constructor method for OpenJobEx
     * @uses OpenJobEx::setJob()
     * @uses OpenJobEx::setScript()
     * @param \StructType\Job $job
     * @param \StructType\ScriptExecution $script
     */
    public function __construct(\StructType\Job $job, ?\StructType\ScriptExecution $script = null)
    {
        $this
            ->setJob($job)
            ->setScript($script);
    }
    /**
     * Get job value
     * @return \StructType\Job
     */
    public function getJob(): \StructType\Job
    {
        return $this->job;
    }
    /**
     * Set job value
     * @param \StructType\Job $job
     * @return \StructType\OpenJobEx
     */
    public function setJob(\StructType\Job $job): self
    {
        $this->job = $job;
        
        return $this;
    }
    /**
     * Get script value
     * @return \StructType\ScriptExecution|null
     */
    public function getScript(): ?\StructType\ScriptExecution
    {
        return $this->script;
    }
    /**
     * Set script value
     * @param \StructType\ScriptExecution $script
     * @return \StructType\OpenJobEx
     */
    public function setScript(?\StructType\ScriptExecution $script = null): self
    {
        $this->script = $script;
        
        return $this;
    }
}
