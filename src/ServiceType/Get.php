<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get ServiceType
 * @subpackage Services
 */
class Get extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named GetVersion
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetVersion $parameters
     * @return \StructType\GetVersionResponse|bool
     */
    public function GetVersion(\StructType\GetVersion $parameters)
    {
        try {
            $this->setResult($resultGetVersion = $this->getSoapClient()->__soapCall('GetVersion', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultGetVersion;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetStatus
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetStatus $parameters
     * @return \StructType\GetStatusResponse|bool
     */
    public function GetStatus(\StructType\GetStatus $parameters)
    {
        try {
            $this->setResult($resultGetStatus = $this->getSoapClient()->__soapCall('GetStatus', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultGetStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetExpiration
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetExpiration $parameters
     * @return \StructType\GetExpirationResponse|bool
     */
    public function GetExpiration(\StructType\GetExpiration $parameters)
    {
        try {
            $this->setResult($resultGetExpiration = $this->getSoapClient()->__soapCall('GetExpiration', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultGetExpiration;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAllJobs
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetAllJobs $parameters
     * @return \StructType\GetAllJobsResponse|bool
     */
    public function GetAllJobs(\StructType\GetAllJobs $parameters)
    {
        try {
            $this->setResult($resultGetAllJobs = $this->getSoapClient()->__soapCall('GetAllJobs', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultGetAllJobs;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAllJobsEx
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetAllJobsEx $parameters
     * @return \StructType\GetAllJobsExResponse|bool
     */
    public function GetAllJobsEx(\StructType\GetAllJobsEx $parameters)
    {
        try {
            $this->setResult($resultGetAllJobsEx = $this->getSoapClient()->__soapCall('GetAllJobsEx', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultGetAllJobsEx;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\GetAllJobsExResponse|\StructType\GetAllJobsResponse|\StructType\GetExpirationResponse|\StructType\GetStatusResponse|\StructType\GetVersionResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
