<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Open ServiceType
 * @subpackage Services
 */
class Open extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named OpenJob
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\OpenJob $parameters
     * @return \StructType\OpenJobResponse|bool
     */
    public function OpenJob(\StructType\OpenJob $parameters)
    {
        try {
            $this->setResult($resultOpenJob = $this->getSoapClient()->__soapCall('OpenJob', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultOpenJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named OpenJobEx
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\OpenJobEx $parameters
     * @return \StructType\OpenJobExResponse|bool
     */
    public function OpenJobEx(\StructType\OpenJobEx $parameters)
    {
        try {
            $this->setResult($resultOpenJobEx = $this->getSoapClient()->__soapCall('OpenJobEx', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultOpenJobEx;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\OpenJobExResponse|\StructType\OpenJobResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
