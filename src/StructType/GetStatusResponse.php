<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetStatusResponse StructType
 * @subpackage Structs
 */
#[\AllowDynamicProperties]
class GetStatusResponse extends AbstractStructBase
{
    /**
     * The GetStatusResult
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var \StructType\Status
     */
    protected \StructType\Status $GetStatusResult;
    /**
     * Constructor method for GetStatusResponse
     * @uses GetStatusResponse::setGetStatusResult()
     * @param \StructType\Status $getStatusResult
     */
    public function __construct(\StructType\Status $getStatusResult)
    {
        $this
            ->setGetStatusResult($getStatusResult);
    }
    /**
     * Get GetStatusResult value
     * @return \StructType\Status
     */
    public function getGetStatusResult(): \StructType\Status
    {
        return $this->GetStatusResult;
    }
    /**
     * Set GetStatusResult value
     * @param \StructType\Status $getStatusResult
     * @return \StructType\GetStatusResponse
     */
    public function setGetStatusResult(\StructType\Status $getStatusResult): self
    {
        $this->GetStatusResult = $getStatusResult;
        
        return $this;
    }
}
