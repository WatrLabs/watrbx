<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Batch ServiceType
 * @subpackage Services
 */
class Batch extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named BatchJob
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\BatchJob $parameters
     * @return \StructType\BatchJobResponse|bool
     */
    public function BatchJob(\StructType\BatchJob $parameters)
    {
        try {
            $this->setResult($resultBatchJob = $this->getSoapClient()->__soapCall('BatchJob', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultBatchJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named BatchJobEx
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\BatchJobEx $parameters
     * @return \StructType\BatchJobExResponse|bool
     */
    public function BatchJobEx(\StructType\BatchJobEx $parameters)
    {
        try {
            $this->setResult($resultBatchJobEx = $this->getSoapClient()->__soapCall('BatchJobEx', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultBatchJobEx;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\BatchJobExResponse|\StructType\BatchJobResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
