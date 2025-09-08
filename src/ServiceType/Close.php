<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Close ServiceType
 * @subpackage Services
 */
class Close extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CloseJob
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\CloseJob $parameters
     * @return \StructType\CloseJobResponse|bool
     */
    public function CloseJob(\StructType\CloseJob $parameters)
    {
        try {
            $this->setResult($resultCloseJob = $this->getSoapClient()->__soapCall('CloseJob', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultCloseJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CloseExpiredJobs
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\CloseExpiredJobs $parameters
     * @return \StructType\CloseExpiredJobsResponse|bool
     */
    public function CloseExpiredJobs(\StructType\CloseExpiredJobs $parameters)
    {
        try {
            $this->setResult($resultCloseExpiredJobs = $this->getSoapClient()->__soapCall('CloseExpiredJobs', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultCloseExpiredJobs;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CloseAllJobs
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\CloseAllJobs $parameters
     * @return \StructType\CloseAllJobsResponse|bool
     */
    public function CloseAllJobs(\StructType\CloseAllJobs $parameters)
    {
        try {
            $this->setResult($resultCloseAllJobs = $this->getSoapClient()->__soapCall('CloseAllJobs', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultCloseAllJobs;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\CloseAllJobsResponse|\StructType\CloseExpiredJobsResponse|\StructType\CloseJobResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
